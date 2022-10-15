<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class AddTipodocToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            //Tipodoc
            $table->unsignedInteger('tipodoc_id')->default('1');
            $table->foreign('tipodoc_id')->references('id')->on('tipodocs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('tipodocs');
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_tipodoc_id_foreign');
            $table->dropColumn('tipodoc_id');

        });
        
    }
}
