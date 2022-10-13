<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigInteger('sale_id');
            $table->integer('sale_quantity');
            $table->integer('sale_amount');

            $table->bigInteger('sale_medicine_id');
            // $table->foreign('sale_medicine_id')
            //       ->references('medicine_id')
            //       ->on('medicine')
            //       ->onUpdate('cascade')
            //       ->onDelete('cascade');

            $table->bigInteger('sale_prescription_id');
            // $table->foreign('sale_prescription_id')
            // ->references('prescription_id')
            // ->on('prescriptions')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');

            $table->bigInteger('sale_customer_id');
            // $table->foreign('sale_customer_id')
            //         ->references('customer_id')
            //         ->on('customer')
            //       ->onUpdate('cascade')
            //       ->onDelete('cascade');

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
        Schema::dropIfExists('sales');
    }
}
