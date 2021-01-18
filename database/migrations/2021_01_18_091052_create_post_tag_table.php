<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            // siapkan atribut untuk table post_tag
            // $table->foreignId('post_id');
            // $table->foreignId('tag_id');
            // buat mereka jadi primary agar tidak ada duplikat
            $table->primary(['post_id', 'tag_id']);

            // buat agar jika dihapus antara tag atau postnya nanti mereka terhubung dan bisa terhapus 2 2nya
            $table->foreignId('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreignId('tag_id')->references('id')->on('tags')->onDelete('cascade');
            // ATAU
            // $table->foreignId('post_id')->constrained('posts');
            // $table->foreignId('tag_id')->constrained('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
