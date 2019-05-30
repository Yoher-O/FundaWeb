<?php
class BrandsController
{
    public function Index() {
        session_start();
        $_SESSION['page'] = "Marcas";
        require_once 'view/brands/index.php';
    }

    public function add() {
        $_SESSION['page'] = "Marcas";
        require_once 'view/brands/form/index.php';
    }
}