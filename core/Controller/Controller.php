<?php

    namespace Core\Controller;


    class Controller{

    	//Stocker les chemin des views par defaut vide
        protected $viewPath;

        //Stocker le nom du template de page
        protected $template;



        /**
         * Permet d'afficher le contenu html sur la vue à afficher
         * @param  $view        page à utiliser
         * @param  $variables   variables des contenues à afficher
         */
        protected function render($view, $variables = []){
            ob_start();
            extract($variables);  //extraire la valeur des variables
            require($this->viewPath . str_replace('.', '/', $view) . '.php');
            $content = ob_get_clean();
            require($this->viewPath . 'templates/' . $this->template . '.php');
        }



        /**
         * rediriger l'utilisateur si la page demandée n'existe pas
         */
         public static function notFound(){
             header('HTTP/1.0 404 Not Found');
             die('page introuvable');
         }



         /**
         * rediriger l'utilisateur si l'accès n'est pas autorisé
         */
        public function forbidden(){
            header('HTTP/1.0 403 Forbidden');
            die('accès interdit');
        }
    }



?>
