<?php

  namespace Core\HTML;



  class Form{

      public $data = array();   //stocke les données dans un tableau
      public $surround = 'p';



      //Constructeur
      /**
       * Constructeur 
       * @param array $data  optionnel les données
       */
      public function __construct($data = array()){
        $this->data = $data;
      }



      /**
       * Ajouter des balises html
       * @param  $html  Balise html
       * @return string
       */
      protected function surround($html){
        return "<{$this->surround}>$html</{$this->surround}>";   //ajouter les accolades pour que la variable soit interprété par les quotes
      }



      /**
       * Stocker la valeur de l'index (si celui-ci existe) du tableau en cours
       * en vérifiant que celle ci est contenu dans un tableau
       * @param  $index
       * @return string
       */
      protected function getValue($index){
          if(is_object($this->data)){
              return $this->data->$index;
          }
          else{
              return isset($this->data[$index]) ? $this->data[$index] : null;
          }
      }



      /**
       * Afficher les champs du formulaires
       * @param  $name  string
       * @param  $label
       * @param  $options array
       * @return [string
       */
      public function input($name, $label, $options = []){
          //stocker le type de champs
          $type = isset($options['type']) ? $options['type'] : 'text';

          return $this->surround(
              '<input type="'. $type . '" name="' . $name . '" value="' . $this->getValue($name) .'"/>'
          );
      }



      /**
       * Modifier la méthode qui affiche le bouton submit du formulaires
       * @return string
       */
      public function submit(){
        return $this->surround('<button type="submit">Envoyer</button>');
      }
  }
?>
