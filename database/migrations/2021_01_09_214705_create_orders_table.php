<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->index()->unsigned();
            $table->integer('unit_id')->index()->unsigned();
            $table->integer('service_id')->index()->unsigned();
            $table->integer('staff_id')->index()->unsigned()->nullable();
            $table->date('target_date');
            $table->time('time_from');
            $table->time('time_to');
            $table->text('description');
            $table->enum('type', ['preview', 'maintenance' , 'other']);
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
        Schema::dropIfExists('orders');
    }
}
