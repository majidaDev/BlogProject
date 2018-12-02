<?php

    namespace App\Controller\Admin;

    use Core\HTML\BootstrapForm;



    class ChapitresController extends AppController{

        /**
         * Charger la table des chapitres dans le constructeur
         */
        public function __construct(){
            parent::__construct();
            $this->loadModel('chapitre');
        }



        /**
         * Lister les chapitres et les envoyer sur la page d'accueil des chapitres du back-end
         * @return Contenu html
         */
        public function index(){
            $items = $this->chapitre->all();
            $this->render('admin.chapitres.index', compact('items'));
        }



        /**
         * Ajouter un chapitre
         * @return Contenu html
         */
        public function add(){
            //Si des données sont envoyées
            if(!empty($_POST)){
                //Ajouter l'enregistrement dans la BDD
                $result = $this->chapitre->create([
                    'titre' => $_POST['titre'],
                ]);
                return $this->index();
            }

            //Initialiser le formulaire
              $form = new BootstrapForm($_POST);

            //afficher le chapitre sur la page d'édition de le chapitre
            $this->render('admin.chapitres.edit', compact('form'));
        }



        /**
         * Modifier un chapitre 
         * @return Contenu html
         */
        public function edit(){
            //Si des données sont envoyées
            if(!empty($_POST)){
                //Modifier l'enregistrement dans la BDD en fonction de l'id
                $result = $this->chapitre->update($_GET['id'], [
                    'titre' => $_POST['titre'],
                ]);

                return $this->index();
            }

            //récupérer le chapitre en fonction de son id
            $chapitre = $this->chapitre->find($_GET['id']);
            
            // Initialiser le formulaire
            $form = new BootstrapForm($chapitre);
            
            //afficher le chapitre sur la page d'édition du chapitre
            $this->render('admin.chapitres.edit', compact('form'));
        }



        /**
         * Supprimer un chapitre 
         * @return Contenu html
         */
        public function delete(){
            //Si on demande à supprimer un article
            if(!empty($_POST)){
                $result = $this->chapitre ->delete($_POST['id']);
                return $this->index();
            }
        }

    }


?>
