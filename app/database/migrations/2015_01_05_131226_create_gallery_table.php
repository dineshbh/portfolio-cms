<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('gallery', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image_url');
            $table->string('image_link');
            $table->unsignedInteger('category_id')->references('id')->on('gallery_categories');
            $table->string('image_text');
            $table->timestamps();
            $table->engine = 'MyISAM';
        });
        DB::statement('ALTER TABLE gallery ADD FULLTEXT search(title)');
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery', function(Blueprint $table) {
            $table->dropIndex('search');
            $table->drop();
        });
    }

}
