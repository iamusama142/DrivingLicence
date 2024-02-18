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
        Schema::create('quickbook_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable();
            $table->string('client_secret')->nullable();
            $table->string('redirect_url')->nullable();
            $table->string('access_token')->nullable();
            $table->string('refresh_token')->nullable();
            $table->string('realm_id')->nullable();
            $table->string('base_url')->nullable();
            $table->string('api_url')->nullable();
            $table->string('others')->nullable();
            $table->string('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quickbook_credentials');
    }
};
