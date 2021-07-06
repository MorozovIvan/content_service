<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class PostManager
{
    /**
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public static function make(User $user)
    {
        return new static($user);
    }

    public function posts(array $exceptIds = []): LengthAwarePaginator
    {
        $user = $this->user;

        return Post::whereHas('author', function ($query) use ($user) {
            $query->whereHas('subscriptions', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->whereNull('blocked_at');
        })->whereNotIn('id', $exceptIds)->jsonPaginate();
    }

    public function pinnedPosts(): Builder
    {
        return Post::whereHas('pinned', function ($query) {
            $query->orderBy('order_number');
        });
    }
}
