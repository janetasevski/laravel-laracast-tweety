<?php
namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function like($user = null, $like = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'liked' => $like
        ]);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        // return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
        return $this->likes()->where('user_id', $user->id)->where('liked', true)->exists();
    }

    public function isDisLikedBy(User $user)
    {
        // return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
        return $this->likes()->where('user_id', $user->id)->where('liked', false)->exists();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'SELECT tweet_id, SUM(liked) AS likess, SUM(!liked) AS dislikess FROM likes GROUP BY tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }
}