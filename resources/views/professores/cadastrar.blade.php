@extends('template.template')
@section('contents')
<div class="card">
	<div class="card-header">Cadastro de Professores</div>
	<div class="card-body">
		<form class="form">
			<div class="form-group">
				<input type="text" name="nome" class="form-control" placeholder="Digite o nome do professor...">
			</div>
			<div class="form-group">
				<input type="text" name="nascimento" class="form-control" placeholder="Informe a data de nascimento...">
			</div>
		</form>	
	</div>
</div>
@endsection