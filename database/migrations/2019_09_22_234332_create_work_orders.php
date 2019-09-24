<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('status', 50)->nullable();
            $table->integer('priority')->default(3);
            $table->json('equipment')->nullable();
            $table->integer('crew')->default(1);
            $table->float('hours')->default(1);
            $table->text('description')->nullable();
            $table->foreign('estimate_id')->references('id')->on('estimates');
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
        Schema::dropIfExists('work_orders');
    }
}
