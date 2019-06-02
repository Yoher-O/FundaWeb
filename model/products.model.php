<?php
require_once 'model/conection.php';
class Products
{
    private $pdo;
    
	public $id;
    public $description;
    public $precio;
    public $codigo;
	public $marca;
    public $categoria;	
	
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    public function Listar()
    {
	    try
	    {
		    $result = array();
		    $stm = $this->pdo->prepare("CALL listarProducto();");
		    $stm->execute();
		    return $stm->fetchAll(PDO::FETCH_OBJ);
	    }
	    catch(Exception $e)
	    {
		    die($e->getMessage());
	    }
    }
    
    public function Eliminar($id)
	{
		try
		{
			$stm = $this->pdo
			                ->prepare("CALL eliminarProducto(?);");
			return $stm->execute(array($id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($id, $description, $price, $code, $brand, $categoria) {
		try
		{
			$sql = "CALL editarProducto(?,?,?,?,?,?)";
			return $this->pdo->prepare($sql)
			     ->execute(
				    array(
						$id, 
						$description, 
						$price, 
						$code, 
						$brand,
						$categoria
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Agregar($description, $price, $code, $brand, $categoria) {
		try
		{
			$sql = "CALL agregarProducto(?,?,?,?,?)";
			return $this->pdo->prepare($sql)
			     ->execute(
				    array(
						$description, 
						$price, 
						$code, 
						$brand,
						$categoria
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
    }
}