<?php

    namespace App\Entity;

    use Core\Entity\Entity;



    class ChapitreEntity extends Entity{

        /**
         * Retourner le lien de l'article
         * @return string
         */
        public function getUrl(){
          return 'index.php?p=posts.chapitre&id=' . $this->id;
        }
    }


?>
