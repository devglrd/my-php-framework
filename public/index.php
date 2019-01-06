<?php
/**
 * Created by PhpStorm.
 * User: glrd
 * Date: 06/01/2019
 * Time: 14:46
 */
require '../vendor/autoload.php';


$app = new Framework\App([
    \App\Modules\Blog\BlogModule::class
]);

$response = $app->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());
\Http\Response\send($response);
