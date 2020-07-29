<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminPermissionTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('admin_permission', function (Blueprint $table) {
      $table->id();
      $table->foreignId('admin_id')
        ->constrained('admins')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->foreignId('permission_id')
        ->constrained('permissions')
        ->onUpdate('cascade')
        ->onDelete('cascade');
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
    Schema::dropIfExists('admin_permission');
  }
}
