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
        Schema::create('job_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->string('workplace_address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_dept')->nullable();
            $table->string('position')->nullable();
            $table->string('employment_letter_url')->nullable();
            $table->string('status')->default('not sent');
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
        Schema::dropIfExists('job_profiles');
    }
};
