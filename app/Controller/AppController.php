<?php

    namespace App\Controller;

    use Core\Controller\Controller;
    use \App;




    class AppController extends Controller{

        //Définir le nom du template de page
        protected $template = 'default';



        /**
         * Initialise la propriété viewpath qui stocke le chemin des views
         */
        public function __construct(){
            $this->viewPath = ROOT . '/app/Views/';
        }



        /**
         * Charger la table passé en paramètre
         * @param  $model_name
         */
        protected function loadModel($model_name){
             $this->$model_name = App::getInstance()->getTable($model_name);

        }
    }


?>
