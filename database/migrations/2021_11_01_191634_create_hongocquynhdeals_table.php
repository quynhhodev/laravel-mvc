<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
class CreateHongocquynhdealsTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hongocquynhdeals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug', 100);
            $table->string('image', 100);
            $table->mediumText('detail');
            $table->float('price', 10, 2);
            $table->float('salePrice', 10, 2);
            $table->date('countDown');
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
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
        Schema::dropIfExists('hongocquynhdeals');
    }
}
