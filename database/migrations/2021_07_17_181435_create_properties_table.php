<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create("properties", function (Blueprint $table) {
      $table->bigIncrements("id");
      $table->integer("agent_id");
      $table->string("name");
      $table->string("description");
      $table->string("location");
      $table->string("n_rooms");
      $table->string("price");
      $table->string("photo")->nullable();
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
    Schema::dropIfExists("properties");
  }
}
