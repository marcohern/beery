<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beery_orders_ex', function (Blueprint $table) {
            $table->id();
            $table->boolean('invoice')->default(false);
            $table->dateTime('effective_date')->nullable(true);
            $table->decimal('total_price', 18, 4)->default(0.0);
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beery_orders_ex');
    }
};
