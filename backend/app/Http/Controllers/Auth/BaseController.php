<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\AuthService\AuthService;

class BaseController extends Controller
{
    public $service;
    public function __construct(AuthService $service){
        $this->service = $service;
    }
}
