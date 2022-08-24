<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_type_id');
            $table->string('nip')->nullable();
            $table->string('nidn')->nullable();
            $table->string('name');
            $table->enum('gender', ['L', 'P']);
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('birthplace')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('religion');
            $table->string('address');
            $table->string('city');
            $table->string('district');
            $table->string('province');
            $table->string('nationality');
            $table->string('postal_code');
            $table->string('back_degree')->nullable();
            $table->string('front_degree')->nullable();
            $table->timestamps();
            $table->foreign('employee_type_id')->references('id')->on('employee_types')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
