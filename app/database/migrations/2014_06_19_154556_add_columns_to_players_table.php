<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToPlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('players', function(Blueprint $table)
		{
			$table->string('school_name');
			$table->string('committed_to');
			$table->string('digital_signature');
			$table->text('nike_release_text');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('players', function(Blueprint $table)
		{
			$table->dropColumn('school_name');
			$table->dropColumn('committed_to');
			$table->dropColumn('digital_signature');
			$table->dropColumn('nike_release_text');
		});
	}

}
