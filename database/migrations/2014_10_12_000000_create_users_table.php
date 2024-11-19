<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('institution_id')->default(0);
            $table->string('title')->nullable();
            $table->string('username')->nullable();
            $table->string('fullname')->nullable();
            $table->string('designation')->nullable();
            $table->string('work_phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('status')->default('active');
            $table->integer('added_by')->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        // Insert a default user
        DB::table('users')->insert([
            'fullname' => 'Super Admin',
            'username' => 'admin@admin.com',
            'email' => 'admin@admin.com',
            'work_phone_number' => '0123456789', // corrected from 'phone' to 'work_phone_number'
            'password' => bcrypt('123456'),
            'status' => 'active',
            'role' => 'super_admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
