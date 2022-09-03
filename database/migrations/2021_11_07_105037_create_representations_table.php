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
        Schema::create('representations', function (Blueprint $table) {
            $table->id();
            $table->string('locale', '2')->default('fa');
            $table->string('name', 32);
            $table->string('company_name', 64);
            $table->string('city', 32);
            $table->string('phone', 32);
            $table->string('address', 128);
            $table->text('description')->nullable()->comment('Length is 512');
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
        Schema::dropIfExists('representations');
    }
};
