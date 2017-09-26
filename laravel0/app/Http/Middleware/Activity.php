<?php
namespace App\Http\Middleware;
class Activity{
    //请求执行前执行   是前置
//    public function handle($request,\Closure $next){
//        if(time() < strtotime('2017-09-13')){
//            return redirect('activity0');
//        }else{
//            return $next($request);
//        }
//    }

    //后置
    public function handle($request,\Closure $next){
        $request = $next($request);
        var_dump($request);
    }
}