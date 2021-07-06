<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @OA\Schema(
 *     title="Author",
 *     description="Author model",
 *     @OA\Xml(
 *         name="Author"
 *     )
 * )
 */
class Author extends Model
{
    use WithSubscriptions;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
