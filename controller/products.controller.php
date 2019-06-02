<?php
require_once 'model/products.model.php';
class ProductsController
{

    public function __CONSTRUCT(){
        session_start();
        $this->model = new Products();
        $_SESSION['description']= '';
        $_SESSION['id'] = '';
        $_SESSION['price'] = '';
        $_SESSION['code'] = '';
        $_SESSION['brand'] = '';
        $_SESSION['category'] = '';
        $_SESSION['page'] = "Productos";
    }

    public function Index() {
        $_SESSION['page'] = "Productos";
        require_once 'view/products/index.php';
    }

    public function add() {
        $_SESSION['page'] = "Productos";
        if (isset($_GET['id'])) {
            $_SESSION['id'] = $_GET['id'];
        }
        if (isset($_GET['description'])) {
            $_SESSION['description']= $_GET['description'];
        }
        if (isset($_GET['price'])) {
            $_SESSION['price']= $_GET['price'];
        }
        if (isset($_GET['code'])) {
            $_SESSION['code']= $_GET['code'];
        }
        if (isset($_GET['brand'])) {
            $_SESSION['brand']= $_GET['brand'];
        }
        if (isset($_GET['category'])) {
            $_SESSION['category']= $_GET['category'];
        }
        require_once 'view/products/form/index.php';
    }

    public function Listar() {
        $resultSet["data"] = $this->model->Listar();
        echo json_encode($resultSet);
        exit();
    }

    public function Save() {
        if ($_POST['id'] != '') {
            $id = $_POST['id'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $code = $_POST['code'];
            $brand = $_POST['brand'];
            $category = $_POST['category'];

            $result = $this->model->Actualizar($id, $description, $price, $code, $brand, $category);
            echo $result;
            exit();
        }
        if ($_POST['id'] == '') {
            $description = $_POST['description'];
            $price = $_POST['price'];
            $code = $_POST['code'];
            $brand = $_POST['brand'];
            $category = $_POST['category'];

            $result = $this->model->Agregar($description, $price, $code, $brand, $category);
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
