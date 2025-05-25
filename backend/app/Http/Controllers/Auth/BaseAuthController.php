<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\Auth\AuthService;

class BaseAuthController extends Controller
{
    public $service;
    public function __construct(AuthService $service){
        $this->service = $service;
    }
}
