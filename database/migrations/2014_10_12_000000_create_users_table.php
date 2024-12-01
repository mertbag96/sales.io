<?php

use App\Models\Role;
use App\Models\Company;

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // ID
            $table->id();

            // User Role ID
            $table->foreignIdFor(Role::class)
                ->onDelete('cascade')
                ->default(0)
                ->comment('Role of the user');

            // User Company ID
            $table->foreignIdFor(Company::class)
                ->nullable()
                ->comment('Company of the user');

            // User Name
            $table->string('name')
                ->comment('Name of the user');

            // User Surname
            $table->string('surname')
                ->comment('Surname of the user');

            // User Email
            $table->string('email')
                ->unique()
                ->comment('Email of the user');

            // User Email Verification Date
            $table->timestamp('email_verified_at')
                ->nullable()
                ->comment('Email verification date of the user');

            // User Password
            $table->string('password')
                ->comment('Password of the user');

            // User Remember Me Token
            $table->rememberToken()
                ->comment('Remember Me Token of the user');

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
        Schema::dropIfExists('users');
    }
};
