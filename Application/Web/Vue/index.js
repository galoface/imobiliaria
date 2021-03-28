var vm = new Vue({
		el:"#app",
		data:{	
			add: false,
			edit:false,
			remove:false,
			showAdd: false,
			endereco: false,
			habilitarCep: false,
			imovel:{},
			imoveis:{}
		},
		mounted: function() {
			this.get();
		},
		methods:{	
			addNew() {
				let p = new Promise((resolve, reject) => {
					window.location.href="#endForm";
					var formData = vm.toFormData(vm.imovel);
					axios.post("Application/Process/ImovelProcess.php?action=addNew", formData).then(function(response){
						vm.imovel = [];	
						vm.get();		
						vm.edit = false;
						vm.remove = false;
						document.location.reload(true);		
					});
               	});

				return p;
			},
			loadDataForUpdate(value) {
				let p = new Promise((resolve, reject) => {
					if(!vm.showAdd) {
						vm.showAdd = true;
						vm.edit = true;
						vm.imovel.id = value.ID;
						vm.imovel.nome = value.NOME;
						vm.imovel.cep = value.CEP;
						vm.imovel.endereco = value.ENDERECO;
						vm.imovel.bairro = value.BAIRRO;
						vm.imovel.numero = value.NUMERO;
						vm.imovel.complemento = value.COMPLEMENTO;
					}else {
						vm.showAdd = false;
						vm.edit = false;
						vm.remove = false;
						vm.add = false;
					}
               	});

				return p;
			},
			update() {
				let p = new Promise((resolve, reject) => {					
					var formData = vm.toFormData(vm.imovel);	
					axios.post("Application/Process/ImovelProcess.php?action=update", formData).then(function(response){
						vm.imovel = [];	
						vm.showAdd = false;
						vm.remove = false;
						vm.add = false;
						vm.get();
						document.location.reload(true);	
					});
               	});

				return p;
			},
			doRemove(value) {
				let p = new Promise((resolve, reject) => {	
					vm.imovel.id = value.ID;
					var formData = vm.toFormData(vm.imovel);

					axios.post("Application/Process/ImovelProcess.php?action=delete", formData).then(function(response){
						vm.get();
						vm.showAdd = false;
						vm.edit = false;
						vm.add = false;
						document.location.reload(true);
					});
               	});

				return p;
			},
			get() {		
				let p = new Promise((resolve, reject) => {	
					axios.get("Application/Process/ImovelProcess.php?action=get").then(function(response) {
						if(!response.data.error) {
							vm.imoveis = response.data.imovel;
						}
					});
               	});
			},
			getCep() {
				var formData = vm.toFormData(vm.imovel);
				vm.habilitarCep = false;
				axios.post("Application/Process/ImovelProcess.php?action=getCep", formData).then(function(response) {
					if(!response.data.error) {
						vm.imovel.uf = response.data.imovel.uf;
						vm.imovel.cidade = response.data.imovel.localidade;
						vm.imovel.endereco = response.data.imovel.logradouro;
						vm.imovel.bairro = response.data.imovel.bairro;
						vm.habilitarCep = true;

						vm.endereco = true;
					}
				});
			},
			checkForm(e) {                
	          e.preventDefault();
	        },
			toFormData(obj){
				var fd = new FormData();
				for(var i in obj){
					fd.append(i,obj[i]);
				}
				return fd;
			}
		}
	})	
	