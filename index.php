<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
			<script src="https://unpkg.com/vue"></script>
			<script src="https://kit.fontawesome.com/a1c4d33208.js"></script>

			<!-- Bootstrap CSS -->
			<script src="https://kit.fontawesome.com/a1c4d33208.js"></script>
			<title>Cadastro de Imóvel</title>
		</head>
		<body>
			<div id="app" class="container mt-4">
				<form class=" mt-4" action="" method="POST" @submit="checkForm">
					<div class="form-group">
						<div class="busca">
							<legend> Lista de Imoveis</legend>
						</div>
					</div>
					<div class="show" >
						<div class="row mb-4"  style="position: relative">	
							<div class="col-md-12">
								<div class="table-responsive-sm mt-2">
									<table class="table table-hover">
									  <thead>
									    <tr>
									      <th class="text-center" scope="col">ID</th>									    	
									      <th class="text-center" scope="col">NOME</th>
									      <th class="text-center" scope="col">CEP</th>
									      <th class="text-center" scope="col">UF</th>
									      <th class="text-center" scope="col">CIDADE</th>
									      <th class="text-center" scope="col">ENDERECO</th>
									      <th class="text-center" scope="col">BAIRRO</th>
									      <th class="text-center" scope="col">NUMERO</th>				      
									      <th class="text-center" scope="col">COMPLEMENTO</th>
									    </tr>
									  </thead>
									  <tbody>
									    <tr v-for="value in imoveis">
									  	<template v-if="imoveis.length > 1">
									      <td  class="text-center">{{value.ID}}</td>
									      <td  class="text-center">{{value.NOME}}</td>
									      <td  class="text-center">{{value.CEP}}</td>
									      <td  class="text-center">{{value.UF}}</td>
									      <td  class="text-center">{{value.CIDADE}}</td>
									      <td  class="text-center">{{value.ENDERECO}}</td>
									      <td  class="text-center">{{value.BAIRRO}}</td>
									      <td  class="text-center">{{value.NUMERO}}</td>
									      <td  class="text-center">{{value.COMPLEMENTO}}</td>															      
									      <td  class="text-center"><button class="btn-sm btn-warning" @click="loadDataForUpdate(value)">Edit</button></td>		      
									      <td  class="text-center"><button class="btn-sm btn-danger" @click="doRemove(value)">Remove</button></td>	
									     </template>
									    </tr>
									    <template v-if="imoveis_exists">
									      <td  class="text-center">{{imoveis.ID}}</td>
									      <td  class="text-center">{{imoveis.NOME}}</td>
									      <td  class="text-center">{{imoveis.CEP}}</td>
									      <td  class="text-center">{{imoveis.UF}}</td>
									      <td  class="text-center">{{imoveis.CIDADE}}</td>
									      <td  class="text-center">{{imoveis.ENDERECO}}</td>
									      <td  class="text-center">{{imoveis.BAIRRO}}</td>
									      <td  class="text-center">{{imoveis.NUMERO}}</td>
									      <td  class="text-center">{{imoveis.COMPLEMENTO}}</td>															      
									      <td  class="text-center"><button class="btn-sm btn-warning" @click="loadDataForUpdate(imoveis)">Edit</button></td>		      
									      <td  class="text-center"><button class="btn-sm btn-danger" @click="doRemove(imoveis)">Remove</button></td>	
									     </template>
									  </tbody>
									</table>
								</div>		
							</div>
						</div>
					</div>
					<div class="add" v-if="showAdd">

						<div class="form-group">
							<label>Nome</label>
							<input class="form-control" type="text" name="nome" v-model="imovel.nome"></input>
						</div>
						<div class="form-group">
							<label>Cep</label>
							<input class="form-control" type="text" name="cep" v-model="imovel.cep"></input>
						</div>
						<div class="mb-2">
							<button class="btn btn-primary btn-sm mb-4" @click="getCep()" v-model="imovel.habilitarCep">Buscar endereço</button>
						</div>
						<div v-if="endereco">
							<div class="form-group">
								<label>UF</label>
								<input class="form-control" type="text" name="uf" v-model="imovel.uf" readonly></input>
							</div >
							<div class="form-group">
								<label>Cidade</label>
								<input class="form-control" type="text" name="localidade" v-model="imovel.cidade" readonly></input>
							</div>
							<div class="form-group">
								<label>Endereco</label>
								<input class="form-control" type="text" name="endereco" v-model="imovel.endereco" readonly></input>
							</div >
							<div class="form-group">
								<label>Bairro</label>
								<input class="form-control" type="text" name="bairro" v-model="imovel.bairro" readonly></input>
							</div>
							<div class="form-group">
								<label>Numero</label>
								<input class="form-control" type="text" name="numero" v-model="imovel.numero"></input>
							</div>
							<div class="form-group">
								<label>Complemento</label>
								<input class="form-control" type="text" name="complemento" v-model="imovel.complemento"></input>
							</div>
							<div class="actions container">
								<div class="row">
									<div v-if="add" class="add col-4">
										<button class="btn btn-lg btn-primary btn-block mt-2" type="submit" name="env" @click="addNew()"> CONFIRMAR</button>
									</div>
									<div v-if="edit" class="add col-4">
										<button class="btn btn-lg btn-primary btn-block mt-2" type="submit" name="env" @click="update()"> CONFIRMAR</button>
									</div>
									<div v-if="remove" class="add col-4">
										<button class="btn btn-lg btn-primary btn-block mt-2" type="submit" name="env" @click="remove()"> CONFIRMAR</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div v-if="!showAdd" class="actions container">
						<div class="row">
							<div class="add col-4">
								<button class="btn btn-lg btn-success btn-block mt-2" name="env" @click="showAdd=true; add=true"> Adicionar</button>
							</div>
						</div>
					</div>
					<div id="endForm" class="mt-4" hidden>
				</form>		
			</div>
		</body>
	</html>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="Application/Web/Vue/index.js" />
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>