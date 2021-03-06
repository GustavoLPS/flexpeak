@extends('template.template')
@section('contents') 
<div class="card">
	<div class="card-header">Cursos</div>
	<div class="card-body">
        <div class="row btn-add mb-3">
            <div class="col-md-12">
                <a href="{{url('/cursos/cadastrar')}}" class="btn btnAdd"><i class="fas fa-plus-circle"></i> Cadastrar</a>
            </div>
        </div>
		<table class="table table-striped mt-3" id="cursos">
			<thead class="colorBar">
				<th>ID</th>
				<th>Nome</th>
				<th>Professor</th>
                <th>Criado em</th>
				<th>Ações</th>
			</thead>
			<tbody>
                <?php $cursos = json_decode($cursos); ?>
                @foreach($cursos as $curso)
                    @foreach($professores as $professor)
                        @if ($curso->id_professores == $professor->id_professores)
                            <?php $nome_professor = $professor->nome_professores ?>
                        @endif
                        <?php 
                            $dt = new DateTime($professor->created_at);
                            $dataC = $dt->format('d/m/Y');
                        ?>
                    @endforeach
				<tr>
					<td>{{$curso->id_cursos}}</td>
					<td>{{$curso->nome_cursos}}</td>
					<td>{{$nome_professor}}</td>
                    <td>{{$dataC}}</td>
					<td>
                        <a href="{{url('/cursos/editar/'.$curso->id_cursos)}}"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                        <a href="{{url('/api/cursos/destroy/'.$curso->id_cursos)}}"><button class="btn btn-danger" onclick="return confirm('Deseja mesmo deletar esse curso?')"><i class="fas fa-user-times"></i></button></a>               
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
            $('#cursos').DataTable({
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

        $('#btnAlunos').removeClass('active');
        $('#btnProfessores').removeClass('active');
        $('#btnCursos').addClass('active');
    </script>
@endsection