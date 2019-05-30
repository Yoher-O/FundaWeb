<?php
require_once 'model/conection.php';
class Categories
{
    private $pdo;
    
	public $id;
    public $name;
	public $description;
	
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
		    $stm = $this->pdo->prepare("CALL listarCategoria();");
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
			                ->prepare("CALL eliminarCategoria(?);");
			return $stm->execute(array($id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($id, $name, $des) {
		try
		{
			$sql = "CALL editarCategoria(?,?,?)";
			return $this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$id,
                        $name,
                        $des,
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Agregar($name, $des) {
		try
		{
			$sql = "CALL agregarCategoria(?,?)";
			return $this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $name,
                        $des,
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
    }
}