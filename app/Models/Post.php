<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @OA\Schema(
 *     title="Post",
 *     description="Post model",
 *     @OA\Xml(
 *         name="Post"
 *     )
 * )
 */
class Post extends Model
{
    use HasFactory;

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function pinned(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'pinned_posts');
    }
}
