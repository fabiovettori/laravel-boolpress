<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->unsignedBigInteger('category_id')->nullable()->after('id'); //creo una nuova colonna con l'id delle categorie
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); //vado a dire a laravel che la nuova chiave creata è una foreign e che rappresenta l'id delle tabella categorie
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->dropForeign('post_category_id_foreign'); //elimino il legame di foreign
            $table->dropColumn('category_id'); //Elimino la colonna creata
        });
    }
}
