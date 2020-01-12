<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressFieldsForReplicationIntoOrdersTable extends Migration
{
    private $columns = [
      'name',
      'surname',
      'house_number',
      'local_number',
      'street',
      'postcode',
      'city',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            foreach ($this->columns as $column) {
                $table->string($column);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            foreach ($this->columns as $column) {
                $table->removeColumn($column);
            }
        });
    }
}
