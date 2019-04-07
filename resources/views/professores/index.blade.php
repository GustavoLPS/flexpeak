@extends('template.template')
@section('contents') 
<div class="card">
	<div class="card-header">Professores</div>
	<div class="card-body">
		<div class="row btn-add mb-3">
            <div class="col-md-12">
                <a href="/professores/cadastrar" class="btn btnAdd"><i class="fas fa-user-plus"></i> Cadastrar</a>
            </div>
        </div>
		<table class="table table-striped mt-3" id="professores">
			<thead class="colorBar">
				<th>ID</th>
				<th>Nome</th>
				<th>Nascimento</th>
				<th>Ações</th>
			</thead>
			<tbody>
                <?php $professores = json_decode($professores); ?>
                @foreach($professores as $professor)
                <?php 
                $data = Datetime::createFromFormat('Y-m-d',$professor->data_nascimento_professores);?>
				<tr>
					<td>{{$professor->id_professores}}</td>
                    <td>{{$professor->nome_professores}}</td>
					<td>{{$data->format('d/m/Y')}}</td>
					<td>
                        <a href=""><button class="btn btn-light"><i class="fas fa-info-circle"></i></button></a>
                        <a href=""><button class="btn btn-light"><i class="fas fa-user-edit"></i></button></a>
                        <a href=""><button class="btn btn-light"><i class="fas fa-user-times"></i></button></a>
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
            $('#professores').DataTable({
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
		$('#btnProfessores').addClass('active');
		$('#btnCursos').removeClass('active');
    </script>
@endsection