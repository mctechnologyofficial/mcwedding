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
        Schema::create('event_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('timezone');
            $table->text('religion');
            $table->text('maps_type');
            $table->text('contract_validation');
            $table->text('contract_name')->nullable();
            $table->date('contract_date');
            $table->text('contract_time_start');
            $table->text('contract_time_end');
            $table->longText('contract_address');
            $table->string('contract_url_address')->nullable();
            $table->text('reception_validation');
            $table->text('reception_name')->nullable();
            $table->date('reception_date');
            $table->text('reception_time_start');
            $table->text('reception_time_end');
            $table->longText('reception_address');
            $table->string('reception_url_address')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_information');
    }
};
