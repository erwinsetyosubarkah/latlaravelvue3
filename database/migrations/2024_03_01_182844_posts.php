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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('i_id');
            $table->string('v_title');
            $table->string('v_image');
            $table->text('tx_content');
            $table->dateTime('dt_created_at');
            $table->dateTime('dt_updated_at');
            $table->dateTime('dt_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
