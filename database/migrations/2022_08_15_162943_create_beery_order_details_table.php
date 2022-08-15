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
        Schema::create('beery_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('beery_orders');
            $table->foreignId('flavor_id')->constrained('beery_flavors');
            $table->integer('qty');
            $table->decimal('unit_price', 18, 4);
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
        Schema::dropIfExists('beery_order_details');
    }
};
