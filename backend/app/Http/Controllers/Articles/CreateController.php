<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Http\Request;
class CreateController extends BaseArticleController
{
    public function index(Request $request)
    {
        $data = $request->all();

        $result = $this->service->store($data, $request);

        return response()->json(['message' => 'OK', 'result' => $result]);
    }
}
//lluminate\Http\Request {#45 // app\Http\Controllers\Articles\CreateController.php:13
//    +attributes:
//Symfony\Component\HttpFoundation
//\
//ParameterBag
// {#50
//     #parameters: []
// }
//  +request:
//Symfony\Component\HttpFoundation
//\
//InputBag
// {#46
//     #parameters: array:2 [
//     "name" => "dasdasdas"
//      "text" => "dsadsadas"
//    ]
//  }
//  +query:
//Symfony\Component\HttpFoundation
//\
//InputBag
// {#53
//     #parameters: []
// }
//  +server:
//Symfony\Component\HttpFoundation
//\
//ServerBag
// {#48
//     #parameters: array:25 [
//     "DOCUMENT_ROOT" => "C:\Users\popap\OneDrive\Рабочий стол\Проекты ларавел\laravel_vue_test\backend\public"
//      "REMOTE_ADDR" => "127.0.0.1"
//      "REMOTE_PORT" => "59538"
//      "SERVER_SOFTWARE" => "PHP/8.4.3 (Development Server)"
//      "SERVER_PROTOCOL" => "HTTP/1.1"
//      "SERVER_NAME" => "127.0.0.1"
//      "SERVER_PORT" => "8000"
//      "REQUEST_URI" => "/api/article/create"
//      "REQUEST_METHOD" => "POST"
//      "SCRIPT_NAME" => "/index.php"
//      "SCRIPT_FILENAME" => "C:\Users\popap\OneDrive\Рабочий стол\Проекты ларавел\laravel_vue_test\backend\public\index.php"
//      "PATH_INFO" => "/api/article/create"
//      "PHP_SELF" => "/index.php/api/article/create"
//      "HTTP_USER_AGENT" => "PostmanRuntime/7.44.0"
//      "HTTP_ACCEPT" => "*/*"
//      "HTTP_POSTMAN_TOKEN" => "36cc0fc2-84de-475c-95dd-d10858e1ac90"
//      "HTTP_HOST" => "localhost:8000"
//      "HTTP_ACCEPT_ENCODING" => "gzip, deflate, br"
//      "HTTP_CONNECTION" => "keep-alive"
//      "CONTENT_TYPE" => "multipart/form-data; boundary=--------------------------570889190697650751885336"
//      "HTTP_CONTENT_TYPE" => "multipart/form-data; boundary=--------------------------570889190697650751885336"
//      "CONTENT_LENGTH" => "2826"
//      "HTTP_CONTENT_LENGTH" => "2826"
//      "REQUEST_TIME_FLOAT" => 1748162981.0143
//      "REQUEST_TIME" => 1748162981
//    ]
//  }
//  +files:
//Symfony\Component\HttpFoundation
//\
//FileBag
// {#52
//     #parameters: array:1 [
//     "preview_image" =>
//Symfony\Component\HttpFoundation\File
//\
//UploadedFile
// {#42
//     -originalName: "йцу.webp"
// -mimeType: "image/webp"
// -error: 0
// -originalPath: "йцу.webp"
// -test: false
//        path: "C:\Users\popap\AppData\Local\Temp"
//        filename: "phpC988.tmp"
//        basename: "phpC988.tmp"
//        pathname: "C:\Users\popap\AppData\Local\Temp\phpC988.tmp"
//        extension: "tmp"
//        realPath: "
//C:\Users\popap\AppData\Local
//\
//Temp\phpC988.tmp
//"
//        aTime: 2025-05-25 08:49:41
//        mTime: 2025-05-25 08:49:41
//        cTime: 2025-05-25 08:49:41
//        inode: 11540474045149383
//        size: 2342
//        perms: 0100666
//        owner: 0
//        group: 0
//        type: "file"
//        writable: true
//        readable: true
//        executable: false
//        file: true
//        dir: false
//        link: false
//        linkTarget: "C:\Users\popap\AppData\Local\Temp\phpC988.tmp"
//      }
//    ]
//  }
//  +cookies:
//Symfony\Component\HttpFoundation
//\
//InputBag
// {#51
//     #parameters: []
// }
//  +headers:
//Symfony\Component\HttpFoundation
//\
//HeaderBag
// {#47
//     #headers: array:8 [
//     "user-agent" => array:1 [
//     0 => "PostmanRuntime/7.44.0"
// ]
//      "accept" => array:1 [
//     0 => "*/*"
// ]
//      "postman-token" => array:1 [
//     0 => "36cc0fc2-84de-475c-95dd-d10858e1ac90"
// ]
//      "host" => array:1 [
//     0 => "localhost:8000"
// ]
//      "accept-encoding" => array:1 [
//     0 => "gzip, deflate, br"
// ]
//      "connection" => array:1 [
//     0 => "keep-alive"
// ]
//      "content-type" => array:1 [
//     0 => "multipart/form-data; boundary=--------------------------570889190697650751885336"
// ]
//      "content-length" => array:1 [
//     0 => "2826"
// ]
//    ]
//    #cacheControl: []
//  }
//  #content: null
//  #languages: null
//  #charsets: null
//  #encodings: null
//  #acceptableContentTypes: null
//  #pathInfo: "/api/article/create"
//  #requestUri: "/api/article/create"
//  #baseUrl: ""
//  #basePath: null
//  #method: "POST"
//  #format: null
//  #session: null
//  #locale: null
//  #defaultLocale: "en"
//  -preferredFormat: null
//    -isHostValid: true
//    -isForwardedValid: true
//    -isSafeContentPreferred: ? bool
//    -trustedValuesCache: []
//    -isIisRewrite: false
//  #json: null
//  #convertedFiles: null
//  #userResolver: Closure($guard = null) {#216
//    class: "
//Illuminate\Auth
//\
//AuthServiceProvider
//"
//    this:
//Illuminate\Auth
//\
//AuthServiceProvider
// {#171 …}
//     use: {
//     $app:
//Illuminate\Foundation
//\
//Application
// {#4 …}
// }
//  }
//  #routeResolver: Closure() {#226
//    class: "
//Illuminate\Routing
//\
//Router
//"
//    this:
//Illuminate\Routing
//\
//Router
// {#43 …}
//     use: {
//     $route:
//Illuminate\Routing
//\
//Route
// {#189 …}
// }
//  }
//  basePath: ""
//  format: "html"
//}
