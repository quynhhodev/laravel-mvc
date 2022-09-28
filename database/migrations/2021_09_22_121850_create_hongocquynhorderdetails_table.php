<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateHongocquynhorderdetailsTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hongocquynhorderdetails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orderId')->unsigned();
            $table->bigInteger('productId')->unsigned();
            $table->float('price');
            $table->smallInteger('quantity');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updatee_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hongocquynhorderdetails');
    }
}
