<!DOCTYPE html>
<html>
<head>
	<title>Flexpeak</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="{{'css/estilo.css'}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#"><img src="{{asset('img/flexpeak.png')}}" height="40px"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a id="btnProfessores" class="nav-link" href="{{url('/professores')}}" class="btn"><i class="fas fa-chalkboard-teacher icon"></i>Professores</a>
		      </li>
		      <li class="nav-item">
		        <a id="btnCursos" class="nav-link" href="{{url('/cursos')}}" class="btn"><i class="fas fa-graduation-cap icon"></i>Cursos</a>
		      </li>
		      <li class="nav-item">
		        <a id="btnAlunos" class="nav-link" href="{{url('/alunos')}}" class="btn"><i class="fas fa-user-graduate icon"></i>Alunos</a>
		      </li>
		      <li class="nav-item">
		        <a id="btnRelatorio" class="nav-link" href="{{url('/relatorio')}}" class="btn"><i class="fas fa-list"></i>Relatorio</a>
		      </li>
		    </ul>
	  </div>
	</nav>
	<section id="main">
		<div class="container">
			<div class="row mt-3">
				<div class="col-lg-12 mx-auto">
					@yield('contents')
				</div>
			</div>	
		</div>
	</section>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

@yield('javascript')
</body>
</html>