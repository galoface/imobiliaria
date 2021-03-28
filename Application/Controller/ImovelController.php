<?php 	

	namespace Application\Controller;
	
	use \Application\Proccess\Base\BaseProccess;
	use \Infra\Repository\ImovelRepository;
	use \Domain\Entity\Imovel;
	use \Domain\Helper\Util;
	use \Infra\Connection\Connection;
	use \Application\Services\API;
	use Exception;

	class ImovelController {

		protected $_baseProcess;
		protected $_imovelRepository;
		protected $_imovel;
		protected $_util;
		protected $_conn;
		protected $_api;

		public function __construct
		(	
			$baseProcess,
			$imovelRepository,
			$imovel,
			$connection
		)
		{				
			$this->_baseProcess = $baseProcess;
			$this->_imovelRepository = $imovelRepository;	
			$this->_imovel = $imovel;
			$this->_conn = $connection;
			$this->_util = new Util();
			$this->_api = new API();
		}

		public function addNew($post = array())
		{
			try {

				$imovel = $this->_imovelRepository->create();

				if (!$post) {
					
					return false;	
				}

				foreach ($post as $key => $value) {
					if ($key != 'input') {
						if(!empty($value) && $value != "") {
							if ($key == "cep") {
								$value = preg_replace("/[^0-9]/", "", $value);
							}
							$imovel->$key = $value;
						}
					}
				}
				
				$this->_imovelRepository->save();
				return true;
				
			} catch (Exception $e) {
				return false;				
			}
		}

		public function update($post = array())
		{
			try {
				if (!$post) {
					return false;
				}

				if (isset($post[strtolower($this->_imovel::primary_key)])) {
					$imovel = $this->_imovelRepository->loadById($post[$this->_imovel::primary_key]);
				}
				elseif (isset($post[strtoupper($this->_imovel::primary_key)])) {
					$imovel = $this->_imovelRepository->loadById($post[$this->_imovel::primary_key]);
				}
				else {
					return false;
				}

				if (!isset($imovel->_original_data)) {
					throw new Exception("Error Processing Request");					
				}
				
				foreach ($post as $key => $value) {					
					if ($key != 'input') {
						$key = strtoupper($key);
						if (array_key_exists($key, $imovel->_original_data)) {
							if ($imovel->_original_data[$key] != $value) {
								if(!empty($value) && $value != "") {
									$imovel->$key = $value;
								}
							}
						}
					}
				}
				$this->_imovelRepository->save();
			} catch (Exception $e) {
				return false;
			}
		}

		public function delete($post = array())
		{
			try {		

				if (isset($post[strtolower($this->_imovel::primary_key)])) {
					$imovel = $this->_imovelRepository->loadById($post[$this->_imovel::primary_key]);
				}
				elseif (isset($post[strtoupper($this->_imovel::primary_key)])) {
					$imovel = $this->_imovelRepository->loadById($post[$this->_imovel::primary_key]);
				}
				else {
					return false;
				}
				if (!isset($imovel->_original_data)) {
					throw new Exception("Error Processing Request");					
				}

				$imovel->EXCLUIDO = 1;
				$this->_imovelRepository->save();
			} catch (Exception $e) {
				return false;
			}
		}

		public function get($get = array())
		{
			try {	
				$imovel = $this->_imovelRepository->load($get);
				if (!$imovel->_original_data) {
					throw new Exception("Error Processing Request");					
				}

				return $imovel->_original_data;
			} catch (Exception $e) {
				return false;
			}
		}

		public function getCep($get = array())
		{
			try {	
				if (!isset($get["cep"])) {
					return false;
				}
				$cep =  preg_replace("/[^0-9]/", "", $get["cep"]);
				$endereco = $this->_api::getCep($cep);

				return $endereco;

			} catch (Exception $e) {
				return false;
			}
		}
	}

?>