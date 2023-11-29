<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\OpenApi(
 *   @OA\Info(
 *      title="Documentação da API de Notas Fiscais",
 *      version="1.0.0",
 *      description="Esta é a documentação Swagger para a API do sistema de controle de notas fiscais, desenvolvido com Laravel. Este documento detalha todos os endpoints relacionados ao gerenciamento de notas fiscais, incluindo cadastro de usuários, autenticação, e CRUD para notas fiscais.",
 *      @OA\Contact(
 *          email="edu_du@icloud.com"
 *      ),
 *   ),
 *   @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Servidor da API de Notas Fiscais"
 *   ),
 *   @OA\Components(
 *     @OA\SecurityScheme(
 *       securityScheme="bearerAuth",
 *       type="http",
 *       scheme="bearer",
 *       bearerFormat="JWT"
 *     )
 *   )
 * )
 */




class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
