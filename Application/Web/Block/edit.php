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