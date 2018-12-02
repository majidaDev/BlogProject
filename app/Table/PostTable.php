<?php

    namespace App\Table;

    use Core\Table\Table;



    class PostTable extends Table{

        //définir un nom de table pour les articles
        protected $table = 'articles';

        

    	/**
         * Récupère les derniers articles
         * @return array
         */
        public function last(){
            return $this->query("
                SELECT articles.id, articles.titre, articles.contenu, articles.date, chapitres.titre as chapitre
                FROM articles
                LEFT JOIN chapitres ON chapitre_id = chapitres.id
                ORDER BY articles.date DESC
            ");
        }



        /**
         * Récupère les derniers articles du chapitre demandée
         * @param $chapitres_id int
         * @return array
         */
        public function lastByChapitre($chapitre_id){
            return $this->query("
                SELECT articles.id, articles.titre, articles.contenu, articles.date, chapitres.titre as chapitre
                FROM articles
                LEFT JOIN chapitres ON chapitre_id = chapitres.id
                WHERE articles.chapitre_id = ?
                ORDER BY articles.date DESC",
                [$chapitre_id]
              );
        }



        /**
         * Récupère un article en liant le chapitre associée
         * @param $id int
         * @return App\Entity\PostEntity
         */
        public function findWitdhChapitre($id){
            return $this->query("
                SELECT articles.id, articles.titre, articles.contenu, articles.date, chapitres.titre as chapitre
                FROM articles
                LEFT JOIN chapitres ON chapitre_id = chapitres.id
                WHERE articles.id = ?",
                [$id], true
            );
        }

    }

?>
