<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsSignatureDateToPlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('players', function(Blueprint $table)
		{
			$table->date('player_signature_date');
			$table->date('parent_signature_date');
			$table->string('parent_digital_signature');

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
			$table->dropColumn('player_signature_date');
			$table->dropColumn('parent_signature_date');
			$table->dropColumn('parent_digital_signature');
		});
	}

}
