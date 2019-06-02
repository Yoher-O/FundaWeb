<?php
require_once 'model/conection.php';
class Brands
{
    private $pdo;
    
	public $id;
    public $name;
	
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
		    $stm = $this->pdo->prepare("CALL listarMarca();");
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
			                ->prepare("CALL eliminarMarca(?);");
			return $stm->execute(array($id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($id, $name) {
		try
		{
			$sql = "CALL editarMarca(?,?)";
			return $this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$id,
                        $name
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Agregar($name) {
		try
		{
			$sql = "CALL agregarMarca(?)";
			return $this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $name
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
    }
}