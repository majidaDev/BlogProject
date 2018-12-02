<?php

    use Core\Config;
    use Core\Database\MysqlDatabase;




    class App{

        //Propriété qui sauvegarde la connexion à la BDD
        public $title = 'mon super blog';


        //Stocker l'intance de configuration de connexion à la BDD 
        private $db_instance;


        //Créer la propriété qui stockera l'instance unique
        private static $_instance;



        /**
         * Méthode statique qui permet d'instancier ou de récupérer l'instance unique
         * Instancier la class si l'instance n'existe pas
         * @return L'instance
         */
        public static function getInstance(){
            if(is_null(self::$_instance)){
                self::$_instance = new App();
            }
            return self::$_instance;

        }



        /**
         * Chargement de l'autoloader contenu dans le dossier app et core 
         * avec la méthode register de la class Autoloader
         */
        public static function load(){
            session_start();

            require ROOT . '/app/Autoloader.php';
            App\Autoloader::register();

            require ROOT . '/core/Autoloader.php';
            Core\Autoloader::register();
        }



        /**
         * permettre de faire des instances de class plus facilement
         * @param  $name
         * @return instance
         */
        public function getTable($name){
            $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';   // '\\App\\Tables\\' permet de forcer le namespace complet
            return new $class_name($this->getDb());
        }



        /**
         * Récupérer les informations de configuration
         * Stocker la configuration
         * Vérifier que la propriétée $db_instance est vide
         * @return l'instance
         */
        public function getDb(){
            $config = config::getInstance(ROOT . '/config/config.php');   //en param le fichier de configuration à appeler
            if(is_null($this->db_instance)){
                $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
            }

            return $this->db_instance;
        }
    }


?>
