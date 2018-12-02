<?php

    namespace App\Entity;

    use Core\Entity\Entity;



    class PostEntity extends Entity{

        /**
         * Retourner le lien de l'article
         * @return string
         */
        public function getUrl(){
          return 'index.php?p=posts.single&id=' . $this->id;
        }



        /**
         * Affichage de l'extrait et ajout du lien de l'article
         * @return string
         */
        public function getExtrait(){
          $html = '<p>' . substr($this->contenu, 0, 100) . '...</p>';
          $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
          return $html;
        }
    }


?>
