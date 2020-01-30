<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNeededColumnsIntoAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('house_number')->nullable();
            $table->string('local_number')->nullable();

            $table->removeColumn('house_no');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('surname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->removeColumn('name');
            $table->removeColumn('surname');
            $table->removeColumn('house_number');
            $table->removeColumn('local_number');
        });
    }
}
