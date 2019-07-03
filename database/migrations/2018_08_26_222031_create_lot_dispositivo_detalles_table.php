<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIotDispositivoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Iot_dispositivo_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_dispositivo')->nullable();
            //$table->foreign('id_dispositivo')->references('id')->on('Iot_dispositivos');
            $table->tinyInteger('battery')->nullable();
            $table->tinyInteger('tx_power')->nullable();
            $table->tinyInteger('adv_interval')->nullable();
            $table->string('profile', 15)->nullable();
            $table->boolean('suffling')->nullable();
            $table->string('notes', 45)->nullable();
            $table->tinyInteger('mayor')->nullable();
            $table->tinyInteger('minor')->nullable();
            $table->string('namespace_id', 45)->nullable();
            $table->string('url', 45)->nullable();
            $table->decimal('firmware_version', 10, 2)->nullable();
            $table->timestamp('date_sync')->nullable();
            $table->string('mac_adress', 17)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Iot_dispositivo_detalles');
    }
}
