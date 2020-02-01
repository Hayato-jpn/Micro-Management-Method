<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('eat_date');
            $table->string('eat_time');
            $table->string('food');
            $table->double('protein', 10, 1); //integerから変更
            $table->double('carbohydrate', 10, 1); //integerから変更
            $table->double('lipid', 10, 1); //integerから変更
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
        Schema::dropIfExists('food');
    }
}
