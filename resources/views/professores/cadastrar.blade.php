@extends('template.template')
@section('contents')
<div class="card">
	<div class="card-header">Cadastro de Professores</div>
	<div class="card-body">
		@if(isset($return))
            @if($return == 'success')
                <div class="alert alert-success" role="alert">Professor cadastrado com sucesso!</div>
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
		<form class="form" method="POST" action="/flexpeak/public/api/professores/store">
			{{csrf_field()}}
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
			          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
			        </div>
					<input type="text" name="nome" class="form-control" placeholder="Digite o nome do professor...">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
			          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-calendar-alt"></i></span>
			        </div>
					<input type="text" id="nascimento" name="nascimento" class="form-control" placeholder="Informe a data de nascimento...">
				</div>
			</div>
			<input type="submit" class="btn btn-primary align-right mb-auto" name="cadastrar" value="cadastrar">
			
		</form>	
	</div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
	$('#nascimento').mask('99/99/9999');
</script>
@endsection