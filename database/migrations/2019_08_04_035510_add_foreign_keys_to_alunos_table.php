<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAlunosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('alunos', function(Blueprint $table)
		{
			$table->foreign('id_cursos', 'cursos_alunos_fk')->references('id_cursos')->on('cursos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('alunos', function(Blueprint $table)
		{
			$table->dropForeign('cursos_alunos_fk');
		});
	}

}
