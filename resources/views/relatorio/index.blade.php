<!DOCTYPE html>
<html>
<head>
	<title>Relatorio</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="{{asset('css/estilo.css')}}">
</head>
<body>

	<div style="height: 60px; width: 100%; background: #F8F9FA">
		<table width="100%">
			<tr>
				<td style="width: 20%;"><img src="{{asset('img/flexpeak.png')}}" height="40px"></td>
				<td style="width: 30%;text-align: left;"><h2>Relatório de Alunos</h2></td>
			</tr>
		</table>
		<table width="100%" style="margin-top: 10px;">
			<tr class="colorBar" style="text-align: center;">
				<td style="padding: 10px;">Aluno</th>
				<td>Curso</th>
				<td>Professor</th>
			</tr>
			<tr>
				@foreach($alunos as $aluno)
					<td style="padding: 5px">{{$aluno->nome_alunos}}</td>
					<td>{{$aluno->nome_cursos}}</td>
					<td>{{$aluno->nome_professores}}</td>
				@endforeach
			</tr>
		</table>
	</div>
</body>
</html>