<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table){
              $table->addColumn('smallInteger', 'year');
              $table->addColumn('boolean', 'is_available');
              $table->addColumn('bigInteger', 'retailer_id');
              $table->string('color', 32);
              $table->string('body_type', 32);
              $table->string('engine', 32);
              $table->string('gearbox', 32);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table){
            $table->dropColumn('year');
            $table->dropColumn('is_available');
            $table->dropColumn('retailer_id');
            $table->dropColumn('color');
            $table->dropColumn('body_type');
            $table->dropColumn('engine');
            $table->dropColumn('gearbox');
        });
    }
}
