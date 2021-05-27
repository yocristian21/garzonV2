<?php
class View{
    function __construct(){
      //  echo "<p>Vista base de la clase View</p>";
    }
    
    function render($nombre){
        require 'views/' . $nombre . '.php';
    }
    

}
?>
