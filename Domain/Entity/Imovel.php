<?php  
	
	namespace Domain\Entity;

	use \Domain\Entity\Base\BaseEntity;

	class Imovel extends BaseEntity {

		public const get_class = "\Domain\Entity";
		public const primary_key = "id";
		public const reference_key = "nome";
		public const table = "Imovel";

	}
?>