<?php

use App\Models\User;

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            // ID
            $table->id();

            // Customer User ID
            $table->foreignIdFor(User::class)
                ->onDelete('cascade')
                ->comment('User of the customer');

            // Customer Phone
            $table->string('phone')
                ->comment('Phone of the customer');

            // Customer Address
            $table->text('address')
                ->comment('Address of the customer');

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
        Schema::dropIfExists('customers');
    }
};
