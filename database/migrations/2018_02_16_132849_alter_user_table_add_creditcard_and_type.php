<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTableAddCreditcardAndType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('credit_card_id');
            $table->unsignedInteger('type_id');


            $table->foreign('credit_card_id')->references('id')->on('Credit_card');
            $table->foreign('type_id')->references('id')->on('type');
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
            $table->dropColumn([ 'credit_card_id', 'type_id' ]);
            $table->dropForeign(['users_type_id_foreign', 'users_credit_card_id_foreign']);
        });
    }
}
