<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data = null){
        $res = ['success' => true];
        if($data !== null){
            $res['data'] = $data;
        }
        return response()->json($res);
    }

    public function error($data, $errorCode = 1001){
        $res = [
            'success' => false,
            'errorCode' => $errorCode,
            'data' => $data,
        ];
        return response()->json($res);
    }

    //chrome dd() bug 暂用
    public function dd($data){
        http_response_code(500);
        dd($data);
    }
}
