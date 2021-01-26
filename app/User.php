<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * identifikasi bahwa satu user dapat memiliki banyak post, dengan menggunakan penamaan plural
    *
    * @return hasMany(Post::class)
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
    * untuk mengidentifikasi apakah dia admin, cara kerja sistem role sederhana
    *
    * @return boolean
    */
    public function isAdmin()
    {
        // return $this->username == "rizukiRyumada" ? true : false;
        // ATAU
        return $this->username == "rizukiRyumada"; // ini ada di AuthServiceProvider trueFalsenya
    }

    public function gravatar($size = 150)
    {
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=mp&s=" . $size;
    }
}
