<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];
    /**
    * fungsi ini untuk mengidentifikasikan relasi many-to-many ke Eloquent
    *
    * @return belongsToMany(Class::class, 'post_tag')
    */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
        // default parameter keduanya
        // return belongsToMany(Post::class, 'post_tag');
    }
}
