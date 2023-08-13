<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lawyers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longtext('bio');
            $table->string('image');
            $table->longtext('officeaddress');
            $table->string('phonenumber');
            $table->string('emailaddress');
            $table->string('website');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('fax');
            $table->string('linkdlin');
            $table->string('r_experience');
            $table->string('r_personal');
            $table->string('r_online_reviews');
            $table->string('r_online_profiles');
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
        //
    }
}
