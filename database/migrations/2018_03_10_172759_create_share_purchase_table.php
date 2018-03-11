<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharePurchaseTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('share_purchase', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('company_name');
            $table->string('share_instrument_name');
            $table->integer('quantity');
            $table->double('price',12,10);
            $table->double('total_investment',12,10);
            $table->string('certificate_number');
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
                        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('share_purchase');
    }
}
