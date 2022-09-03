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
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->string('code', 10)->comment('National Code');
            $table->string('year', 4)->comment('Year of Birth');
            $table->boolean('gender')->comment('0 is [Female] and 1 is [Male]');
            $table->boolean('marital_status')->comment('0 is [Single] and 1 is [Married]');
            
            $table->string('father_job', 32)->nullable();
            $table->enum('military_status', [0, 1, 2, 3, 4])->default(0)->comment('0 is [Female] and 1 is I [Have an end of service card] and 2 is [I have not served] and 3 id [Bail Exemption] and 4 is [medical Exemption]');
            $table->enum('education', [1, 2, 3, 4])->comment('1 is [Cycle] and 2 is [Diploma] and 3 is [Associate Degree] and 4 is [Expert]');
            $table->string('field', 32)->nullable();

            $table->enum('willingness_work', [1, 2, 3, 4, 5, 6, 7])->comment('1 is [Production] and 2 is [Official] and 3 is [Services] and 4 is [Transportation] and 5 is [Marketing] and 6 is [Quality control] and 7 is [Designing]');
            $table->string('name_guarantor', 32)->nullable();
            $table->boolean('work_experience')->comment('0 is [No] and 1 is [Yes]');
            $table->text('work_experience_description')->nullable()->comment('Length is 512');

            $table->string('mobile', 11);
            $table->string('phone', 11)->comment('Landline phone'); 
            $table->text('address')->nullable()->comment('Length is 128');

            $table->string('photo_path');

            $table->timestamp('read_at')->nullable();

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
        Schema::dropIfExists('employments');
    }
};
