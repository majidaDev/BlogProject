<?php

    namespace Core\Auth;

    use Core\Database\Database;




    class DBAuth{

        //stocker la connexion à la BDD au niveau de l'instance
        private $db;


        /**
         * Récupérer une instance de la connexion à la BDD
        */
        public function __construct(Database $db){
            $this->db = $db;
        }



        /**
         * Connaitre l'identifiant de l'utilisateur
         * Si l'utilisateur est connecté on retourne son id
         * @return $_SESSION['auth'];
         */
        public function getUserId(){
            if($this->logged()){
                return $_SESSION['auth'];
            }
            return false;
        }



        /*
         * Permettre à l'utilisateur de se connecter
         * Verifier qu'on à un utilisateur et que le mot de passe entré dans le formulaire 
         * correspond au mot de passe de la BDD
         * et on stocke l'id de l'utilisateur dans une session
         * @param  $username
         * @param  $password
         * @return boolean
         */
         public function login($username, $password){
            $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);

            if($user){
                if($user->password === sha1($password)){
                    $_SESSION['auth'] = $user->id; /*---stocker l'id d'user dans une session */
                    return true;
                }
            }
            return false;
        }



        /**
         * Vérifier que l'utilisateur est connecté
         * @return $_SESSION['auth']
         */
        public function logged(){
            return isset($_SESSION['auth']);
        }


    }


?>
