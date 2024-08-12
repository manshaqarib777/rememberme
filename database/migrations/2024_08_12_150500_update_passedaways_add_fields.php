<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('passedaways', function (Blueprint $table) {
            $table->string('first_name')->nullable()->change();
            $table->string('last_name')->nullable()->change();
            $table->string('city')->nullable(); // for storing image file path
            $table->string('state')->nullable(); // for storing video URL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('passedaways', function (Blueprint $table) {
            $table->string('first_name')->change();
            $table->string('last_name')->change();
            $table->dropColumn('city'); // for storing image file path
            $table->dropColumn('state'); // for storing video URL
        });
    }
};
