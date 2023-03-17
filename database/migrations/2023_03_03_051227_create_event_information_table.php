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
            $table->date('contract_date')->nullable();
            $table->text('contract_time_start')->nullable();
            $table->text('contract_time_end')->nullable();
            $table->longText('contract_address')->nullable();
            $table->string('contract_url_address')->nullable();
            $table->text('reception_validation')->nullable();
            $table->text('reception_name')->nullable();
            $table->date('reception_date')->nullable();
            $table->text('reception_time_start')->nullable();
            $table->text('reception_time_end')->nullable();
            $table->longText('reception_address')->nullable();
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
