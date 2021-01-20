<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // definisikan kolom apa aja yang bisa diisi
    protected $fillable = ['name', 'slug'];

/* -------------------------------------------------------------------------- */
/*                                relasi tabel                                */
/* -------------------------------------------------------------------------- */

    /**
     * membuat function untuk mengidentifikasi kalau kategori memiliki banyak post
     * perhatikan nama functionnya menggunakan kata plural
     *
     * @return void
     */
    public function posts()
    {
        // return $this->hasMany(Post::class); // defaultnya 'category_id'
        // atau
        // return $this->hasMany(Post::class, 'category_id'); // default foreign keynya kyk gini 'category_id'

        // jika ingin mencustom nama foreign keynya
        return $this->hasMany(Post::class, 'id_category');
    }
}
