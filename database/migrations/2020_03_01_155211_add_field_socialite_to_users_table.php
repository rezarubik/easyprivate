<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldSocialiteToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('socialite_id')->nullable()->after('id');
            $table->string('socialite_name')->nullable()->after('socialite_id');
            $table->string('avatar')->nullable()->after('socialite_name');
            $table->string('password')->nullable()->change();
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
            $table->dropColumn('socialite_id');
            $table->dropColumn('socialite_name');
            $table->dropColumn('avatar');
        });
    }
}
