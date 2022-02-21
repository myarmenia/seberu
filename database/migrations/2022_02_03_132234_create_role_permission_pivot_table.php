<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');

            $table->foreign('permission_id')
            ->references('id')
            ->on('permissions')
            ->onDelete('cascade');

            $table->foreign('role_id')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_permissions', function (Blueprint $table) {
          $table->dropForeign('permission_id');
        });
        Schema::table('role_permissions', function (Blueprint $table) {
          $table->dropForeign('role_id');
        });
        Schema::dropIfExists('role_permission_pivot');
    }
}
