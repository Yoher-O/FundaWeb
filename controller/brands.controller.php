<?php
require_once 'model/brands.model.php';
class BrandsController
{

    public function __CONSTRUCT(){
        session_start();
        $this->model = new Brands();
        $_SESSION['name']= '';
        $_SESSION['id'] = '';
        $_SESSION['page'] = "Marcas";
    }

    public function Index() {
        $_SESSION['description'] = '';
        require_once 'view/brands/index.php';
    }

    public function add() {
        $_SESSION['page'] = "Marcas";
        if (isset($_GET['id'])) {
            $_SESSION['id'] = $_GET['id'];
        }
        if (isset($_GET['name'])) {
            $_SESSION['name']= $_GET['name'];
        }
        require_once 'view/brands/form/index.php';
    }

    public function Listar() {
        $resultSet["data"] = $this->model->Listar();
        echo json_encode($resultSet);
        exit();
    }

    public function Save() {
        if ($_POST['id'] != '') {
            $id = $_POST['id'];
            $name = $_POST['name'];

            $result = $this->model->Actualizar($id, $name);
            echo $result;
            exit();
        }
        if ($_POST['id'] == '') {
            $name = $_POST['name'];

            $result = $this->model->Agregar($name);
            echo $result;
            exit();
        }    
    }

    public function Eliminar() {
      $result = $this->model->Eliminar($_POST['id']);
      echo $result;
       exit();
    }
}
