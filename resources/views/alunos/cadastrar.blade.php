@extends('template.template')
@section('contents')
<div class="card">
	<div class="card-header">Cadastro de Alunos</div>
	<div class="card-body">
		@if(isset($return))
            @if($return == 'success')
                <div class="alert alert-success" role="alert">Aluno cadastrado com sucesso!</div>
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
		<form class="form" method="POST" action="{{url('/api/alunos/store')}}">
			{!! csrf_field()!!}
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
					          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user-graduate icon"></i></span>
					        </div>
							<input type="text" name="nome" class="form-control" placeholder="Digite o nome do aluno...">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
					          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-map-marked-alt"></i></span>
					        </div>
							<input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Avenida, Rua, Beco, Travessa, etc..." readonly>
						</div>
					</div>
					<div class="form-group">
						<input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" readonly>
					</div>
					<div class="form-group">
		                <div class="input-group">
							<div class="input-group-prepend">
					          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-graduation-cap icon"></i></span>
					        </div>
			                <select class="form-control" name="curso">
			                    <option value="">Escolha um curso</option>
			                    @foreach($cursos as $curso)
			                        <option value="{{($curso->id_cursos)}}">{{($curso->nome_cursos)}}</option>
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
							<input type="text" id="nascimento" name="nascimento" class="form-control" placeholder="Informe a data de nascimento...">
						</div>
					</div>
					<div class="form-group">
						<input type="number" name="numero" class="form-control" placeholder="Informe o número do local...">
					</div>
					<div class="form-group">
						<input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" readonly>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
						        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-envelope-open-text"></i></span>
						    </div>
							<input type="text" id="cep" name="cep" class="form-control" placeholder="Informe o CEP...">
						</div>
					</div>
					<div class="form-group">
						<input type="text" name="complemento" class="form-control" placeholder="Informe o bloco, apartamento, quadra ou ponto de referência...">
					</div>
					<div class="form-group">
						<input type="text" id="estado" name="estado" class="form-control" placeholder="Estado" readonly>
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary align-right mb-auto" name="cadastrar" value="cadastrar">
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
		})
</script>
@endsection