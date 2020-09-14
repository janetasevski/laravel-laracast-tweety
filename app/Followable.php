<?php
namespace App;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unFollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        // if ($this->folowing($user)) {
        //     return $this->unFollow($user);
        // } 

        // return $this->follow($user);

        $this->follows()->toggle($user);
    }

    // Who i follow
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    // Check did auth user folow given user
    public function folowing(User $user)
    {
        // This query load all follows collection and can be slow on lot of friends
        //return $this->follows->contains($user);

        // This query first load instnce of class not entierly collection
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }
}