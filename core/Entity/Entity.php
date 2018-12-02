<?php

    namespace Core\Entity;



    class Entity{

        /**
         * Utiliser cette fonction dès que le système tombe sur une fonction qu'il ne connait pas
         * @param  $key
         * @return string
         */
        public function __get($key){
            $method = 'get' . ucfirst($key);
            $this->$key = $this->$method();
            return $this->$key;
        }
    }




?>
