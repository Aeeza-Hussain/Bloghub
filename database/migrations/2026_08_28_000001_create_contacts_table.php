<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// This migration creates the 'contacts' table to store messages
// submitted via the Contact page form.

return new class extends Migration
{
    /**
     * Run the migrations.
     * Called when you run: php artisan migrate
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();                          // Auto-increment primary key
            $table->string('name');                // Visitor's full name
            $table->string('email');               // Visitor's email address
            $table->string('subject');             // Message subject
            $table->text('message');               // Full message body
            $table->timestamps();                  // created_at & updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     * Called when you run: php artisan migrate:rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
