<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('google_id')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('annual_income')->nullable();
            $table->enum('occupation', ['Private job', 'Government job', 'Business'])->default('Private job');
            $table->enum('family_type', ['Joint family', 'Nuclear family'])->default('Nuclear family');
            $table->enum('manglik', ['Yes', 'No'])->default('No');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
