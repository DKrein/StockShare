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
            $table->decimal('price',19,10);
            //max total_invest being 999.999.999,9999999999
            $table->decimal('total_investment',22,10);
            //max total_invest being 999.999.999.999,9999999999
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
