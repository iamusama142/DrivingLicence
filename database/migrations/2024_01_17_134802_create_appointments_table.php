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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255)->unique()->index();
            $table->string('phone_no', 20)->unique();
            $table->string('address', 255);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('zip_code', 20);
            $table->string('permit_no', 50);
            $table->longText('packages_locations');
            $table->string('send_txt_msgs_to', 20);
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
