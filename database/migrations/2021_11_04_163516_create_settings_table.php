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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name_fa', 128);
            $table->string('app_name_en', 128);
            $table->string('dollar', 128);
            $table->boolean('allow_comment')->default(1)->comment('Close comments in products section');
            $table->boolean('allow_email')->default(1)->comment('In the Contact Us section, sending an email will be closed');
            $table->boolean('allow_employment_form')->default(1)->comment('1 is [Allowed] and 0 is [Denied]');
            $table->boolean('allow_representation_form')->default(1)->comment('1 is [Allowed] and 0 is [Denied]');
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
        Schema::dropIfExists('settings');
    }
};
