<?php
require_once 'model/categories.model.php';
class CategoriesController
{
    public function __CONSTRUCT(){
        session_start();
        $this->model = new Categories();
        $_SESSION['name']= '';
        $_SESSION['id'] = '';
        $_SESSION['description'] = '';
    }

    public function Index() {
        $_SESSION['page'] = "Categorias";
        require_once 'view/categories/index.php';
    }

    public function add() {
        $_SESSION['page'] = "Categorias";
        if (isset($_GET['id'])) {
            $_SESSION['id'] = $_GET['id'];
        }
        if (isset($_GET['name'])) {
            $_SESSION['name']= $_GET['name'];
        }
        if (isset($_GET['description'])) {
            $_SESSION['description']= $_GET['description'];
        }
        require_once 'view/categories/form/index.php';
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
            $description = $_POST['description'];

            $result = $this->model->Actualizar($id, $name, $description);
            echo $result;
            exit();
        }
        if ($_POST['id'] == '') {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $result = $this->model->Agregar($name, $description);
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