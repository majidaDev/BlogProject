<?php

    namespace Core\Table;

    use Core\Database\Database;



    class Table{

        //Stocker le nom de la table
        protected $table;


        //stocker la connexion à la BDD au niveau de l'instance
        protected $db;



        /**
         * deviner le nom de la table à partir du nom de la class
         * Si le nom de la table ($table) est vide
         * couper le nom de la class en plusieurs parties. 
         * stocker le dernier élément du tableau $parts
         * mettre le nom de la class en minuscule et remplacer le mot table par du vide
         */
        public function __construct(Database $db){
            $this->db = $db;
            if(is_null($this->table)){
                $parts = explode('\\', get_class($this));
                $class_name = end($parts);
                $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
            }
        }



        /**
         * Récupérer tous les articles
         * @return string  la requète sql
         */
        public function all(){
            return $this->query("SELECT * FROM " . $this->table);
        }



        /**
         * Récupérer un article en fonction de son id
         * Initialiser la connexion à la BDD et faire la requète avec en paramètre
         * la requète, l'id et définir d'afficher un seul résultat
         * @param  $id
         * @return array
         */
        public function find($id){
            return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
        }



        /**
         * Mettre à jours les articles en fonction de son ID dans la BDD
         * @param  $id
         * @param  $fields
         * @return array requète sql
         */
        public function update($id, $fields){
            $sql_parts = [];
            $attributes = [];

            //parcourir les différents champs de notre array
            foreach ($fields as $k => $v) {
                $sql_parts[] = "$k = ?";
                $attributes[] = $v;   //incrémentation de la valeur
            }

            $attributes[] = $id;   //éléments qui correspondent au point d'interrogation
            $sql_part = implode(', ', $sql_parts);  //on sépare les champs par des virgules 

            return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
        }



        /**
         * Supprimer un enregistrement
         * @param  $id
         * @return array  Requète sql
         */
        public function delete($id){
            return $this-> query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
        }



        /**
         * Ajouter un enregistrement dans la BDD
         * @param  $fields Champs de la BDD
         * @return array   la requète sql
         */
        public function create($fields){
            $sql_parts = [];
            $attributes = [];

            //parcourir les différents champs de notre array
            foreach ($fields as $k => $v) {
                $sql_parts[] = "$k = ?";
                $attributes[] = $v;   //incrémentation de la valeur
            }

            $sql_part = implode(', ', $sql_parts);   //on sépare les champs par des virgules 

            return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
        }




        /**
          * Récupérer les id et les valeurs des champs select et les stocker dans un array
          * @param  $key   l'id des options du select
          * @param  $value valeur des enregistrements du select à extraire
          * @return array
          */
        public function extract($key, $value){
            $records = $this->all();
            $return = [];
            foreach ($records as $v) {
                $return[$v->$key] = $v->$value;
            }
            return $return;
        }




        /**
          * Définir le type de requète (query ou prepare)
          * Si on a des attributs ce sera une requète préparée, sinon ce sera une requète standard
          * @param  $statement  la requète sql à effectuer
          * @param  $attributes la variable URL
          * @param  boolean $one Afficher un ou plusieurs résultats
          * @return array
          */
        public function query($statement, $attributes = null, $one = false){
            if($attributes){
                return $this->db->prepare(
                    $statement,
                    $attributes,
                    str_replace('Table', 'Entity', get_class($this)),  //Remplacer Table par Entity dans le nom de class
                    $one
                );
            }
             else{
                return $this->db->query(
                    $statement,
                    str_replace('Table', 'Entity', get_class($this)),  //Remplacer Table par Entity dans le nom de class
                     $one
                );
            }
        }

    }

?>
