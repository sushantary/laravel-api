<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GeneralJsonExpection extends Exception
{
    /**
     * Report the exception.
     * @return void
     *
     */
//    public function report()
//    {
////        dump('heey');
//    }

    /**
     * Render the exception as an  HTTP Response.
     * @param Request $request
     */

    public function render($request)
    {
        return new JsonResponse([
           'error'=>[
               'message'=>$this->getMessage(),

           ]
        ],$this->code);

    }
}
