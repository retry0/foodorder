<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ordering', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('tid')->index('tid');
			$table->integer('pid')->index('pid');
			$table->integer('uid')->index('uid');
			$table->foreign('tid')->references('id')->on('ticket')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('pid')->references('id')->on('product')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('uid')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->smallInteger('sugar');
			$table->smallInteger('ice');
			$table->boolean('state')->index('state');
			$table->boolean('paid')->index('paid');
			$table->smallInteger('quantity');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ordering');
	}

}
