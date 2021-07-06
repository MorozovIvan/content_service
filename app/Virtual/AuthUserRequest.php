<?php

/**
 * @OA\Schema(
 *      title="Store User request",
 *      description="Store User request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class AuthUserRequest {
    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of user",
     *      example="john007@gmail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="Password of user",
     *      example="2sdd243523fdg35"
     * )
     *
     * @var string
     */
    public $password;
}
