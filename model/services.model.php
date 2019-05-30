<?php
class Services
{
    private $pdo;
    
	public $id;
    public $name;
	public $description;
	public $price;
	
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
		    $stm = $this->pdo->prepare("CALL LISTARNOMINA();");
		    $stm->execute();
		    return $stm->fetchAll(PDO::FETCH_OBJ);
	    }
	    catch(Exception $e)
	    {
		    die($e->getMessage());
	    }
    }
    
    public function Eliminar($IdNomina)
	{
		try
		{
			$stm = $this->pdo
			                ->prepare("DELETE FROM plno24 WHERE IdNomina = ?");
			return $stm->execute(array($IdNomina));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE uspr01 SET
			                Cedula=?,
						    Nombre=?,
						    Apellido1=?,
						    Apellido2=?,
                            Telefono=?,
						    Direccion=?,
						    Correo=?
				    WHERE IdPersona=?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->IdNomina,
                        $data->Colaborador,
                        $data->SalarioBase,
                        $data->SalarioBruto,
                        $data->fInicio,
                        $data->fFin,
                        $data->Horas
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
    }
}