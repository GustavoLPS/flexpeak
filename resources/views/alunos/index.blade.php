@extends('template.template')
@section('contents') 
<div class="card">
	<div class="card-header">Alunos</div>
	<div class="card-body">
		<div class="row btn-add mb-3">
            <div class="col-md-12">
                <a href="{{url('/alunos/cadastrar')}}" class="btn btnAdd"><i class="fas fa-user-plus"></i> Cadastrar</a>
            </div>
        </div>
		<table class="table table-striped" id="alunos">
			<thead class="colorBar">
				<th>ID</th>
				<th>Nome</th>
				<th>Nascimento</th>
				<th>Curso</th>
				<th>Ações</th>
			</thead>
			<tbody>
                <?php $alunos = json_decode($alunos); ?>
                @foreach($alunos as $aluno)

                    @foreach($cursos as $curso)
                        @if ($curso->id_cursos == $aluno->id_cursos)
                            <?php $nome_curso = $curso->nome_cursos ?>
                        @endif
                    @endforeach

                <?php 
                $data = Datetime::createFromFormat('Y-m-d',$aluno->data_nascimento);?>
				<tr>
					<td>{{$aluno->id_alunos}}</td>
					<td>{{$aluno->nome_alunos}}</td>
					<td>{{$data->format('d/m/Y')}}</td>
					<td>{{$nome_curso}}</td>
					<td>
                        <a href="{{ url('/alunos/detalhe/'.$aluno->id_alunos) }}"><button class="btn btn-info"><i class="fas fa-info-circle"></i></button></a>
                        <a href="{{ url('/alunos/editar/'.$aluno->id_alunos) }}"><button class="btn btn-primary"><i class="fas fa-user-edit"></i></button></a>
                        <a href="{{url('/api/alunos/destroy/'.$aluno->id_alunos)}}"><button class="btn btn-danger" onclick="return confirm('Deseja mesmo deletar esse aluno?')"><i class="fas fa-user-times"></i></button></a>
                    </td>
				</tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('javascript')
	<script>
        $(document).ready( function () {
            $('#alunos').DataTable({
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });

            $('[data-tg=tooltip]').tooltip();
        });

        $('#btnAlunos').addClass('active');
		$('#btnProfessores').removeClass('active');
		$('#btnCursos').removeClass('active');
    </script>
@endsection