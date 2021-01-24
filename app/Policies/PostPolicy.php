<?php

namespace App\Policies;

use App\{Post, User};
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
    * fungsi update untuk post dengan policy
    *
    * @return policy_setting
    */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
    * fungsi update untuk post dengan policy
    *
    * @return policy_setting
    */
    public function edit(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
