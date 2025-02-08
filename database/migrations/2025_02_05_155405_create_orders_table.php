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
        Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->datetime('tgl_jam');
                $table->integer('user_id');
                $table->text('customer');
                $table->enum('dine_in',['0','1'])->default(1);
                $table->text('meja');
                $table->timestamps();
                $table->softDeletes();
        });


       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
     }
};
