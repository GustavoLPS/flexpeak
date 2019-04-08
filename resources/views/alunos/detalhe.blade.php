@extends('template.template')

@section('contents')
<div class="card">
	<div class="card-header">Dados do Aluno</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-2">
				<label for="id">ID: </label>
				<h6 id="id">{{$aluno->id_alunos}}</h6>
			</div>
			<div class="col-lg-6">
				<label for="nome">Nome: </label>
				<h6 id="nome">{{$aluno->nome_alunos}}</h6>
			</div>
			<div class="col-lg-4">
				<label for="nasc">Data de Nascimento: </label>
				<h6 id="nasc">{{$data->format('d/m/Y')}}</h6>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<label for="end">Endereço: </label>
				<h6 id="end">{{$aluno->logradouro.", Nº. ".$aluno->numero}}</h6>
			</div>
			<div class="col-lg-4">
				<label for="comp">Complemento: </label>
				<h6 id="comp">{{$aluno->complemento}}</h6>
			</div>
			<div class="col-lg-4">
				<label for="bairro">Bairro: </label>
				<h6 id="bairro">{{$aluno->bairro}}</h6>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<label for="cid">Cidade: </label>
				<h6 id="cid">{{$aluno->cidade}}</h6>
			</div>
			<div class="col-lg-4">
				<label for="est">Estado: </label>
				<h6 id="est">{{$aluno->estado}}</h6>
			</div>
			<div class="col-lg-4">
				<label for="curso">Curso: </label>
				@foreach($cursos as $curso)
					@if($curso->id_cursos == $aluno->id_cursos)
						<h6 id="curso">{{$curso->nome_cursos}}</h6>	
					@endif
				@endforeach
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<label for="dataC">Criado em: </label>
				<h6 id="dataC">{{$dataC}}</h6>
			</div>
		</div>
	</div>
</div>
@endsection