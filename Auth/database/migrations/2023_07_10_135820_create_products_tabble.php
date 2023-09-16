<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTabble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
    
        //  $table->id();
         

            // $table->bigIncrements('id', 30)->primary();


            //  $table->bigInteger('user_id',20);
            //  $table->foreign('user_id')->references('id')->on('users');
            // $table->integer('user_id',20);
            

            // $table->string('product_name',250); 
            // $table->string('product_code', 100);
            // $table->string('details' ,100);
            // $table->string('logo' );
            // $table->timestamps();
            
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('product_name',250);
            $table->string('product_code',100)->unique();
            $table->text('details',100)->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
