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
        if ( !Schema::hasTable('employees') ) {
			Schema::create('employees', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('name', 191)->nullable();			
				$table->text('city', 65535)->nullable();
                $table->text('state', 65535)->nullable();
                $table->text('address', 65535)->nullable();
                $table->text('skills', 65535)->nullable();
				$table->enum('gender', array('male','female'));
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
