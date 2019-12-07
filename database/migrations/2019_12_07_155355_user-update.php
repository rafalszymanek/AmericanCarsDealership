<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('surname', 64);
            $table->string('role', 8);
            $table->bigInteger('address_id');
            $table->boolean('is_active');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('surname');
            $table->dropColumn('role');
            $table->dropColumn('address_id');
            $table->dropColumn('is_active');

        });
    }
}
