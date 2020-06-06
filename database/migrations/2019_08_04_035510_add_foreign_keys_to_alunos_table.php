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
			$table->foreign('curso_id', 'alunos_cursos_fk')->references('id')->on('cursos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
			$table->dropForeign('alunos_cursos_fk');
		});
	}

}
