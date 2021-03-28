<?php 
	
	namespace Infra\Dao;

	use \Infra\Connection\Connection;
	use \Application\Domain\Entity\Imovel;
	use \Infra\Dao\Base\BaseDao

	class ImobiliariaDao extends BaseDao {

		protected $_conn;
		protected $_imovel;

		public function __construct
		(
			Usuario $_imovel,
			Conexao $_conn
		) 
		{
			$this->_conn = $_conn;
			$this->_imovel = $_imovel;
			
			parent::__construct($_imovel, $_conn);
		}
	}
?>