<?php
class Controller{
    function __construct(){
      //  echo "<p>controlador basee padre</p>";
        $this-> view = new View(); 
    }//                consulta
    function loadModel($model){
        // models/consultamodel.php
        $url = 'models/'.$model.'model.php';
  //models/mainmodel.php
 //models/consultamodel.php
        if(file_exists($url)){
            require $url;
            $modelName = $model.'Model';
            //           consultaModel
            $this->model = new $modelName();
        }
    }


}
?>
