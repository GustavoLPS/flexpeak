@extends('template.template')
@section('contents')
<div class="card">
	<div class="card-header">Editar Aluno</div>
	<div class="card-body">
		@if(isset($return))
            @if($return == 'success')
                <div class="alert alert-success" role="alert">Aluno atualizado com sucesso!</div>
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
		<form class="form" method="POST" action="{{url('/api/alunos/update')}}">
			{!! csrf_field()!!}
			<input type="hidden" name="id_alunos" value="{{$aluno->id_alunos}}">
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
					          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user-graduate icon"></i></span>
					        </div>
							<input type="text" name="nome" class="form-control" placeholder="Digite o nome do aluno..." value="{{$aluno->nome_alunos}}">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
					          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-map-marked-alt"></i></span>
					        </div>
							<input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Avenida, Rua, Beco, Travessa, etc..." value="{{$aluno->logradouro}}" readonly>
						</div>
					</div>
					<div class="form-group">
						<input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" value="{{$aluno->bairro}}" readonly>
					</div>
					<div class="form-group">
		                <div class="input-group">
							<div class="input-group-prepend">
					          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-graduation-cap icon"></i></span>
					        </div>
			                <select class="form-control" name="curso">
			                    <option value="">Escolha um curso</option>
			                    @foreach($cursos as $curso)
			                    	@if($curso->id_cursos == $aluno->id_cursos)
			                        	<option selected value="{{($curso->id_cursos)}}">{{($curso->nome_cursos)}}</option>
			                        @else
			                        	<option value="{{($curso->id_cursos)}}">{{($curso->nome_cursos)}}</option>
			                        @endif
			                    @endforeach
			                </select>
		            	</div>
		            </div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
					          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-calendar-alt"></i></span>
					        </div>
							<input type="text" id="nascimento" name="nascimento" class="form-control" placeholder="Informe a data de nascimento..." value="{{$data->format('d/m/Y')}}">
						</div>
					</div>
					<div class="form-group">
						<input type="number" name="numero" class="form-control" placeholder="Informe o número do local..." value="{{$aluno->numero}}">
					</div>
					<div class="form-group">
						<input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" value="{{$aluno->cidade}}" readonly>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
						        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-envelope-open-text"></i></span>
						    </div>
							<input type="text" id="cep" name="cep" class="form-control" placeholder="Informe o CEP..." value="{{$aluno->cep}}">
						</div>
					</div>
					<div class="form-group">
						<input type="text" name="complemento" class="form-control" placeholder="Informe o bloco, apartamento, quadra ou ponto de referência..." value="{{$aluno->complemento}}">
					</div>
					<div class="form-group">
						<input type="text" id="estado" name="estado" class="form-control" placeholder="Estado" value="{{$aluno->estado}}" readonly>
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary align-right mb-auto" name="atualizar" value="Atualizar">
		</form>	
	</div>
</div>
@endsection

@section('javascript')
	<script type="text/javascript">
		$(document).ready(function() {

			$('#nascimento').mask('99/99/9999');
			$('#cep').mask('99.999-999');

			$('#cep').blur(function () {
				var cep = $(this).val().replace(/[^0-9]/, '');
		        $.ajax({
		           dataType:'jsonp',
		           crossDomain: true,
		           contentType: "application/json",
		           url: 'https://api.postmon.com.br/v1/cep/'+cep,
		           success: function (data) {
		           		console.log(data);
		           		$('#logradouro').val(data.logradouro);
		           		$('#cidade').val(data.cidade);
		           		$('#bairro').val(data.bairro);
		           		$('#estado').val(data.estado_info.nome);
		           }
		        });
		    });
		    
		    $('#btnAlunos').addClass('active');
			$('#btnProfessores').removeClass('active');
			$('#btnCursos').removeClass('active');
		});
</script>
@endsection