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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_type')->default('0');
            $table->string('phone_number')->nullable();
            $table->string('country')->nullable();
            $table->string('account_type')->nullable();
            $table->string('a_number')->nullable();
            $table->string('currency')->nullable();
            $table->string('address')->nullable();
            $table->string('token')->nullable();
            $table->string('is_activated')->default('0');
            $table->string('display_picture')->nullable();
            $table->string('user_status')->default('0');
            $table->string('first_code')->default('1234');
            $table->string('second_code')->nullable();
            $table->string('ssn')->default('1234');
            $table->string('kyc_status')->nullable();
            $table->string('id_document')->nullable();
            $table->string('proof_address')->nullable();
            $table->string('eligible_loan')->default('1000');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
