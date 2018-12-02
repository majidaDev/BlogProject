<?php

  namespace Core\HTML;



  class BootstrapForm extends Form{   


      /**
       * Modifier la méthode qui ajoute des balises html
       * @param  $html  Balise html
       * @return string
       */
      protected function surround($html){
          return "<div class=\"form-group\">$html</div>";
      }



      /**
       * Afficher les champs du formulaires
       * Vérifier si le type de champs et un textarea
       * @param  $name  string
       * @param  $label
       * @param  $options array
       * @return [string
       */
      public function input($name, $label, $options = []){
          //stocker le type de champs
          $type = isset($options['type']) ? $options['type'] : 'text';

          $label = '<label>' . $label . '</label>';

          if($type === 'textarea'){
              $input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) .'</textarea>';
          }
          else{
              $input = '<input type="'. $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control" />';
          }

          return $this->surround($label . $input);
      }




      /**
       * Définir les champs sélect
       * @param  $name
       * @param  $label
       * @param  $options
       * @return string
       */
      public function select($name, $label, $options){
        $label = '<label>' . $label . '</label>';
        $input = '<select class"form-control" name="' . $name . '">';
        foreach ($options as $k => $v) {
            $attributes = '';
            
            //Définir l'option par default
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }

        $input .= '</select>';

        return $this->surround($label . $input);
    }



      /**
       * Modifier la méthode qui affiche le bouton submit du formulaires
       * @return string
       */
      public function submit(){
          return $this->surround('<button type="submit" class="btn btn-success" >Envoyer</button>');
      }

  }




 ?>
