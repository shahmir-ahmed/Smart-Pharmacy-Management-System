<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->integer('prescription_id');
            $table->string('prescription_prescribed_by_name');
            $table->string('prescription_disease');

            $table->bigInteger('prescription_customer_id');
            // $table->foreign('prescription_customer_id')
                    // ->references('customers_id')
                    // ->on('customers')
                    // ->onUpdate('cascade')
                    // ->onDelete('cascade');

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
        Schema::dropIfExists('prescriptions');
    }
}
