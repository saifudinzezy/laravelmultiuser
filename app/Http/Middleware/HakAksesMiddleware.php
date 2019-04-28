<?php

namespace App\Http\Middleware;

use Closure;

class HakAksesMiddleware
{

    //filter siapa yang masuk/yang dpt mengakses halaman
    public function handle($request, Closure $next, $namaRule)
    {
        //cek jika auth sudah login
        //dan dia user(model) punya_rule() jika rulenya tidak sesuai maka
        if (auth()->check() && !auth()->user()->punyaRule($namaRule)){
            //redirect ke halaman khusus
            return redirect('pageAksesKhusus');
        }

        //jika sesuai akan di lanjutkan requestnya
        return $next($request);
    }
}
