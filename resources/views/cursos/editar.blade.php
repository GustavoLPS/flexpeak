@extends('template.template')
@section('contents')
<div class="card">
	<div class="card-header">Editar Curso</div>
	<div class="card-body">
		@if(isset($return))
            @if($return == 'success')
                <div class="alert alert-success" role="alert">Curso atualizado com sucesso!</div>
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
		<form class="form" method="POST" action="{{url('/api/cursos/update')}}">
			{{csrf_field()}}
			<input type="hidden" name="id_cursos" value="{{$curso->id_cursos}}">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
			          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-graduation-cap icon"></i></span>
			        </div>
					<input type="text" name="nome" class="form-control" placeholder="Digite o nome do curso..." value="{{$curso->nome_cursos}}">
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
	                    	@if ($professor->id_professores == $curso->id_professores)
	                        	<option selected value="{{($professor->id_professores)}}">{{($professor->nome_professores)}}</option>
	                        @else
	                        	<option value="{{($professor->id_professores)}}">{{($professor->nome_professores)}}</option>
	                        @endif
	                    @endforeach
	                </select>
            	</div>
            </div>
            <input type="submit" class="btn btn-primary align-right mb-auto" name="atualizar" value="Atualizar">
		</form>	
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	$('#btnAlunos').removeClass('active');
    $('#btnProfessores').removeClass('active');
    $('#btnCursos').addClass('active');
</script>
@endsection