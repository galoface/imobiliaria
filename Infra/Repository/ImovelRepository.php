<?php  
	
	namespace Infra\Repository;

	use \Domain\Entity\Imovel;
	use \Infra\Repository\Base\BaseRepository;
	use \Infra\Connection\Connection;

	class ImovelRepository extends BaseRepository {

		protected $_imovel;
		protected $_conn;

		public function __construct
		(
			Imovel $_imovel,
			$_conn
		) 
		{
			$this->_imovel = $_imovel;
			$this->_conn = $_conn;
			parent::__construct($_imovel, $_conn);
		}
	}
?>