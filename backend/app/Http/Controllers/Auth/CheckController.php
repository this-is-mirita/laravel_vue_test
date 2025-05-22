<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CheckController extends Controller
{
    public function profile(Request $request){
        // получить разрешение указанное при создании
        $request->user()->tokenCan('разрешение_на_просмотр');
        //dd($request->user()->tokenCan('разрешение_на_просмотр')); // может смотреть
        // dd($request->user()->tokenCant('разрешение_на_просмотр')); // не может
        return response()->json($request->user());
    }
}
