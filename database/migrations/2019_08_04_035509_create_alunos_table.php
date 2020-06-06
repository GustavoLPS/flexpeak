<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlunosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alunos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome');
			$table->date('data_nascimento');
			$table->string('logradouro');
			$table->integer('numero');
			$table->string('complemento');
			$table->string('bairro');
			$table->string('cidade');
			$table->string('estado');
			$table->string('cep');
			$table->timestamps();
			$table->integer('curso_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alunos');
	}

}
