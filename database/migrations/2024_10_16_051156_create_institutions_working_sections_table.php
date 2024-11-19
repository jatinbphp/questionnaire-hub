<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('institutions_working_sections', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('institution_id')->default(0);
            $table->integer('section_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions_working_sections');
    }
};
