<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PostManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends ApiController
{
    /**
     * @OA\Get(
     *      path="/posts",
     *      operationId="getPostList",
     *      tags={"Posts"},
     *      security={ {"sanctum": {} }},
     *      summary="Get list of posts",
     *      description="Returns list of posts",
     *      @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page to filter by",
     *         required=true,
     *         @OA\Schema(
     *           type="array",
     *           @OA\Items(type="integer"),
     *         ),
     *         style="form"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PostResource")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index(Request $request)
    {
        $postManager = PostManager::make(auth()->user());

        $pinnedPosts = $postManager->pinnedPosts();

        // TODO: we can use API Resources here instead
        return response()->json([
            'response' => [
                'posts'  => $postManager->posts($pinnedPosts->pluck('id')->toArray())->toArray(),
                'pinned' => $pinnedPosts->get(),
            ],
        ], 200);
    }

    public function pin(Request $request)
    {
        // TODO: add pin method
    }
}
