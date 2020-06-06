<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCursosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cursos', function(Blueprint $table)
		{
			$table->foreign('professor_id', 'cursos_professores_fk')->references('id')->on('professores')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cursos', function(Blueprint $table)
		{
			$table->dropForeign('cursos_professores_fk');
		});
	}

}
