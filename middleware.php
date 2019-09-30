<?php

use \Psr\Http\Server\MiddlewareInterface;
use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Server\RequestHandlerInterface;
use \Psr\Http\Message\ResponseInterface;
use \Tqdev\PhpCrudApi\Config;
use \Tqdev\PhpCrudApi\Api;

class CrudRequest implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        //var_dump($request);
        var_dump($request->getParsedBody());
        die();

        $config = new Config([
            'username' => 'php-crud-api',
            'password' => 'php-crud-api',
            'database' => 'php-crud-api',
            'basePath' => '/',
            'middlewares' => 'authorization, cors, customization',
            'customization.beforeHandler' => function ($operation, $tableName, $request, $environment) {

                var_dump($request);
                var_dump($request->getParsedBody());
            }
        ]);
        $api = new Api($config);
        $response = $api->handle($request);
        return $response;
    }
}
