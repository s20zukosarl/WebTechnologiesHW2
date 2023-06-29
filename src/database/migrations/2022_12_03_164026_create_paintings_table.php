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
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paintings');
    }
	
	public function up()
	 {
		 Schema::create('paintings', function (Blueprint $table) {
		 $table->id();
		 $table->foreignId('artist_id');
		 $table->string('name', 256);
		 $table->decimal('price', 8, 2)->nullable();
		 $table->integer('year');
		 $table->string('image', 256)->nullable();
		 $table->boolean('display');
		 $table->timestamp('created_at')->useCurrent();
		 $table->timestamp('updated_at')->useCurrent();
		 });
	 }

};
