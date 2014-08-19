<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLetterToPlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('players', function(Blueprint $table)
		{
			$table->text('letter');
			$table->string('graduation_year');
			$table->text('comments');
			$table->date('player_registration_date');
			$table->date('payment_due_date');
			$table->integer('check_number');
			$table->decimal('payment_amount');
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
			$table->dropColumn('letter');
			$table->dropColumn('graduation_year');
			$table->dropColumn('comments');
			$table->dropColumn('player_registration_date');
			$table->dropColumn('payment_due_date');
			$table->dropColumn('check_number');
			$table->dropColumn('payment_amount');
			
		});
	}

}
