@extends('template.template')
@section('contents')
<div class="card">
	<div class="card-header">Cadastro de Cursos</div>
	<div class="card-body">
		@if(isset($return))
            @if($return == 'success')
                <div class="alert alert-success" role="alert">Curso cadastrado com sucesso!</div>
            @else
                <div class="alert alert-danger" role="alert">Falha ao cadastrar</div>
            @endif
        @endif

        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
		<form class="form" method="POST" action="/flexpeak/public/api/cursos/store">
			{{csrf_field()}}
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
			          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-graduation-cap icon"></i></span>
			        </div>
					<input type="text" name="nome" class="form-control" placeholder="Digite o nome do curso...">
				</div>
			</div>
			<div class="form-group">
                <div class="input-group">
					<div class="input-group-prepend">
			          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-chalkboard-teacher icon"></i></span>
			        </div>
	                <select class="form-control" name="professor">
	                    <option value="">Escolha um professor</option>
	                    @foreach($professores as $professor)
	                        <option value="{{($professor->id_professores)}}">{{($professor->nome_professores)}}</option>
	                    @endforeach
	                </select>
            	</div>
            </div>
            <input type="submit" class="btn btn-primary align-right mb-auto" name="cadastrar" value="cadastrar">
		</form>	
	</div>
</div>
@endsection