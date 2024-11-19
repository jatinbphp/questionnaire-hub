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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();

            $table->string('institutionName')->nullable();
            $table->text('address')->nullable();
            $table->string('contactPersonName')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('status')->default('active');
            $table->integer('added_by')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
