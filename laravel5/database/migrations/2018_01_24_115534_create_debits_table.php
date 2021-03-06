<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bcycle_id')->unsigned();
            $table->string('name');
            $table->float('value');
            $table->enum('status', array('Pago', 'Pendente', 'Cancelado'))->nullable();

            $table->foreign('bcycle_id')->references('id')->on('billing_cycles');   

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debits');
    }
}
