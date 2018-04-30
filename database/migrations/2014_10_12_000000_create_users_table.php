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
            $table->boolean('suspended')->default(false);
            $table->string('name', 255);
            $table->string('address_one', 40)->nullable()->default(null);
            $table->string('address_two', 40)->nullable()->default(null);
            $table->string('city', 30)->nullable()->default(null);
            $table->string('state', 2)->default('SS');
            $table->string('postal_code', 10)->nullable()->default(null);
            $table->string('phone_number', 14)->nullable()->default(null);
            $table->string('phone_ext', 5)->nullable()->default(null);
            $table->string('gravatar')->nullable()->default(null);
            $table->string('email')->unique();
            $table->string('password');

            // Account verification
            $table->boolean('verified')->default(false);
            $table->string('email_token')->nullable()->default(null);
            $table->timestamp('et_created_at')->nullable()->default(null);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
