<?php

/**
 * @OA\Schema(
 *      title="Store User request",
 *      description="Store User request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreUserRequest {
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of a user",
     *      example="John"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of a user",
     *      example="john007@gmail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="Password of a user",
     *      example="2sdd243523fdg35"
     * )
     *
     * @var string
     */
    public $password;

    /**
     * @OA\Property(
     *      title="password_confirmation",
     *      description="Password of a user to confirm",
     *      example="2sdd243523fdg35"
     * )
     *
     * @var string
     */
    public $password_confirmation;
}
