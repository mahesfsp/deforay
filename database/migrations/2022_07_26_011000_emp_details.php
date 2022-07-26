<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('emp_details') ) {
			Schema::create('emp_details', function(Blueprint $table)
			{
				$table->increments('id');
                $table->integer('emp_id')->unsigned();
				$table->string('cmpname', 191)->nullable();		
                $table->float('salary', 10, 0);				
                $table->integer('exp')->unsigned();
                $table->integer('fromyear')->unsigned()->nullable(); 
                $table->integer('toyear')->unsigned()->nullable();
           
				$table->timestamps();
			});
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
