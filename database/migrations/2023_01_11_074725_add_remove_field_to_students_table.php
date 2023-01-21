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
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['job_status', 'state_of_origin', 'lga_of_origin', 'date_of_graduation']);
            $table->foreignId('user_id')->nullable()->after('id')->constrained();
            $table->string('image')->nullable()->after('phone');
            $table->string('dob')->nullable()->after('image');
            $table->string('marital_status')->nullable()->after('gender');
            $table->string('country')->nullable()->after('address');
            $table->string('mat_no')->nullable()->after('country');
            $table->string('dept')->nullable()->after('mat_no');
            $table->string('cgpa')->nullable()->after('dept');
            $table->string('admission_year')->nullable()->after('cgpa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['image', 'dob', 'marital_status', 'user_id',
                'country', 'mat_no', 'dept', 'cgpa', 'admission_year']);
                $table->string('state_of_origin')->nullable()->after('address');
                $table->string('lga_of_origin')->nullable()->after('state_of_origin');
                $table->string('date_of_graduation')->nullable()->after('lga_of_origin');
                $table->string('job_status')->default('Not Available')->after('date_of_graduation');
        });
    }
};
