<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersNullablesAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->string('lastname', 50)->nullable()->change();
        $table->bigInteger('phone')->nullable()->change();
        $table->string('address')->nullable()->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->string('lastname', 50)->change();
        $table->bigInteger('phone')->change();
        $table->string('address')->change();
      });
    }
}
