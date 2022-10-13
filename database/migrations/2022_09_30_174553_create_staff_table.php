<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigInteger('staff_id');
            $table->string('staff_name', 50);
            // $table->string('staff_father_name', 50);
            $table->string('staff_gender', 6);
            $table->integer('staff_age');
            $table->string('staff_position', 40);
            $table->integer('staff_salary');
            $table->string('staff_contact', 12);
            $table->date('staff_hire_date');
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
        Schema::dropIfExists('staff');
    }
}
