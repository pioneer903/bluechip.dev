<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFieldsToLettersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('letters', function(Blueprint $table)
		{
			$table->string('letter_title');
			$table->text('letter_text');
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('letters', function(Blueprint $table)
		{
			$table->dropColumn('letter_title');
			$table->dropColumn('letter_text');
			$table->dropForeign('players_user_id_foreign');
			$table->dropColumn('user_id');
		});
	}

}
