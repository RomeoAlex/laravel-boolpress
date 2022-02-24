<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //aggiungo la foreign key, la mettiamo nullable perchè non la vogliamo obbligatoria nel caso specifico
            $table->unsignedBigInteger('category_id')->nullable()->after('slug');

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('set null');
        });
    }
    // nel caso della cancellazione dobbiamo specificare cosa deve fare mysql per non "rompere" la tabella
    // per eliminare tutte le confluenze della foreign
    // ->onDelete('cascade');
    // rimette a default tutte le relazioni DA VEDERE SULLA DOCUMENTAZIONE e DEVE ESSERE ASSIMILABILE DALLA TABELLA
    // ->onDelete('default');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // 1 --importante cancellare la colonna in questione!! BISOGNA ANCHE CANCELLARE LA RELAZIONE IN UP
    // 2-- perciò eliminiamo anche la relazione
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
}
