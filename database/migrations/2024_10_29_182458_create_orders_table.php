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
            $table->string('user_email');//email
    
            $table->unsignedBigInteger('resturant_id');

            $table->foreign('resturant_id')->references('id')->on('resturants')
                ->onDelete('cascade');

            // $table->float('sub_total')->default(0);
            // $table->float('tax')->nullable()->default(0);
            // $table->float('discount')->nullable()->default(0);
            $table->float('total')->default(0);

            $table->enum('status' , ['submitted','deliverd', 'pending','in-process' , 'in-way','canceled'])
                    ->default('submitted');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropForeign('resturant_id');
        Schema::dropIfExists('orders');
    }
};
