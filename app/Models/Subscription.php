<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Subscription",
 *     description="Subscription model",
 *     @OA\Xml(
 *         name="Subscription"
 *     )
 * )
 */
class Subscription extends Model
{
    use HasFactory;
}
