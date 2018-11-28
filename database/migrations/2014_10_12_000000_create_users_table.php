<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    /* ERROR Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
    use Illuminate\Support\Facades\Schema;
    As outlined in the Migrations guide to fix this all you have to do is edit your 
    AppServiceProvider.php file and inside the boot method set a default string length:
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
     */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
