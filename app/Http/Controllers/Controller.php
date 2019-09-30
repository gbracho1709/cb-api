<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\OpenApi(
     *     @OA\Info(
     *         version="1.0.0",
     *         title="Api REST",
     *         description="This is a services rest api",
     *         termsOfService="http://swagger.io/terms/",
     *         @OA\Contact(
     *             email="name@domain.com"
     *         ),
     *         @OA\License(
     *             name="Apache 2.0",
     *             url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *         )
     *     ),
     *     @OA\Server(
     *         description="OpenApi host",
     *         url="https://app.domain.com/api/v1"
     *     ),
     *     @OA\Server(
     *         description="OpenApi host",
     *         url="https://domain.com/api/v1"
     *     ),
     *     @OA\Server(
     *         description="OpenApi host",
     *         url="http://localhost:8000/api/v1"
     *     ),
     *     @OA\ExternalDocumentation(
     *         description="Find out more about Swagger",
     *         url="http://swagger.io"
     *     ),
     * )
     */

    /**
     * @OA\SecurityScheme(
     *   securityScheme="api_key",
     *   type="apiKey",
     *   in="header",
     *   name="Authorization"
     * )
     */

     
}
