<?php

    namespace App\Controller;

    use Core\Controller\Controller;



    class PostsController extends AppController{

        /**
         * Charger les tables des articles et des chapitres dans le constructeur
         */
        public function __construct(){
            parent::__construct();
            $this->loadModel('Post');
            $this->loadModel('Chapitre');
        }



        /**
         * Affichage du contenu de la home page
         * @return Contenu html
         */
        public function index(){
            //Lister les articles et les chapitres
            $posts = $this->Post->last();
            $chapitres = $this->Chapitre->all();

            //Générer la vue de la home page pour récupérer le contenu html
            //passer les variables posts et chapitres dans la fonction compact pour générer leurs valeurs automatiquement
            $this->render('posts.index', compact('posts','chapitres'));
        }



        /**
         * Afficher les articles en fonction du chapitre
         */
        public function chapitre(){
            //stocker le chapitre demandé en fonction de son id
            $chap = $this->Chapitre->find($_GET['id']);


            //si la valeur des paramètres URL n'existent pas, on redirige vers la page 404
            if($chap === false){
                $this->notFound();
            }

            
            //stocker les articles du chapitre correspondant
            $articles = $this->Post->lastByChapitre($_GET['id']);
            

            //Afficher toutes les catégories
            $chapitres = $this->Chapitre->all();


            //Générer la vue de la page chapitre pour récupérer le contenu html
            $this->render('posts.chapitre', compact('articles','chapitres', 'chap'));


        }



        /**
         * Afficher l'article de la single page en fonction de son id
         */
        public function single(){
            $article = $this->Post->findWitdhChapitre($_GET['id']);
            $this->render('posts.single', compact('article'));
        }

    }


?>
