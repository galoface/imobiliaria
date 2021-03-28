<?php

	require_once("..\..\Config\AutoLoad.php");

	use \Application\Process\Base\BaseProcess;
	use \Domain\Entity\Imovel;
	use \Infra\Repository\ImovelRepository;
	
	$return = array();
	
	if (isset($_GET['action'])) {	

		$imovel = new Imovel();
		$connection = new Connection();
		$imovelRepository = new ImovelRepository($imovel, $connection);

		if ($connection->conn->beginTransaction()) {

			try {

				$process = new BaseProcess
				(
					$imovelRepository,
					$imovel,
					$connection
				);
				$return["imovel"] = $process->execute();
				$connection->conn->commit();					

			} catch (Exception $e) {

				$connection->conn->rollBack();
				throw new Exception("Error Processing Request");			
			}
		}
	}

	echo json_encode($return);

?>