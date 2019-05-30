<?php
require_once 'model/services.model.php';
class ServicesController
{
    private $model;
    
    public function __CONSTRUCT(){
      $this->model = new Services();
    }
    
    public function Index() {
        $_SESSION['page'] = "Servicios";
        require_once 'view/services/index.php';
    }

    public function add() {
      $_SESSION['page'] = "Servicios";
      require_once 'view/categories/form/index.php';
  }

    public function Guardar(){
        $lot = new Lote();
        $lot->IdLote = $_POST['IdLote'];
        $lot->Nombre = $_POST['Nombre'];
        $lot->AreaL = $_POST['AreaL'];
        $lot->Estado = $_POST['Estado'];
        $lot->Produccion = $_POST['Produccion'];
        if($lot->IdLote > 0){
          $result = $this->model->Actualizar($lot);
          echo $result;
          exit();
        }
        else {
          $result = $this->model->Registrar($lot);
          echo $result;
          exit();
        }
    }
    
    public function Listar() {
      $resultSet["data"] = $this->model->Listar();
      echo json_encode($resultSet);
      exit();
    }

    public function Eliminar()
    {
      $result = $this->model->Eliminar($_POST['IdLote']);
      echo $result;
       exit();
    }
}