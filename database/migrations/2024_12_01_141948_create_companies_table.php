<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            // ID
            $table->id();

            // Company Name
            $table->string('name')
                ->comment('Name of the company');

            // Company Email
            $table->string('email')
                ->unique()
                ->comment('Email of the company');

            // Company Email Verification Date
            $table->timestamp('email_verified_at')
                ->nullable()
                ->comment('Email verification date of the company');

            // Company Phone
            $table->string('phone')
                ->comment('Phone of the company');

            // Company Address
            $table->text('address')
                ->comment('Address of the company');

            // Company Website
            $table->string('website')
                ->comment('Website of the company');

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
