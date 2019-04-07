@extends('template.template')
@section('contents')
<div class="card">
	<div class="card-header">Cadastro de Alunos</div>
	<div class="card-body">
		<form class="form">
			<div class="form-group">
				<input type="text" name="nome" class="form-control" placeholder="Digite o nome do aluno...">
			</div>
			<div class="form-group">
				<input type="text" name="nascimento" class="form-control" placeholder="Informe a data de nascimento...">
			</div>
			<div class="form-group">
				<input type="text" name="cep" class="form-control" placeholder="Informe o CEP...">
			</div>
			<div class="form-group">
				<input type="text" name="logradouro" class="form-control" placeholder="Avenida, Rua, Beco, Travessa, etc..." readonly>
			</div>
			<div class="form-group">
				<input type="number" name="numero" class="form-control" placeholder="Informe o número do local...">
			</div>
			<div class="form-group">
				<input type="text" name="bairro" class="form-control" placeholder="Bairro onde mora o aluno..." readonly>
			</div>
			<div class="form-group">
				<input type="text" name="cidade" class="form-control" placeholder="Cidade em que o aluno reside..." readonly>
			</div>
			<div class="form-group">
				<input type="text" name="estado" class="form-control" placeholder="Estado que pertence a cidade..." readonly>
			</div>
		</form>	
	</div>
</div>
@endsection