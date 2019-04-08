@extends('template.template')
@section('contents')
<div class="card">
	<div class="card-header">Editar Professor</div>
	<div class="card-body">
		@if(isset($return))
            @if($return == 'success')
                <div class="alert alert-success" role="alert">Atualizado com sucesso!</div>
            @else
                <div class="alert alert-danger" role="alert">Falha ao atualizar</div>
            @endif
        @endif

        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
		<form class="form" method="POST" action="{{url('/api/professores/update')}}">
			{{csrf_field()}}
			<input type="hidden" name="id_professores" value="{{$professor->id_professores}}">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
			          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
			        </div>
					<input type="text" name="nome" class="form-control" placeholder="Digite o nome do professor..." value="{{$professor->nome_professores}}">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
			          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-calendar-alt"></i></span>
			        </div>
					<input type="text" id="nascimento" name="nascimento" class="form-control" placeholder="Informe a data de nascimento..." value="{{$data->format('d/m/Y')}}">
				</div>
			</div>
			<input type="submit" class="btn btn-primary align-right mb-auto" name="atualizar" value="Atualizar">
			
		</form>	
	</div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
	$('#nascimento').mask('99/99/9999');
	$('#btnAlunos').removeClass('active');
	$('#btnProfessores').addClass('active');
	$('#btnCursos').removeClass('active');
</script>
@endsection