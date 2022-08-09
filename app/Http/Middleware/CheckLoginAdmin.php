<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    /**
     * ham handle sẽ thực hiện kiểm tra liệu request đưa tới
     * có đủ điều kiện để được đi tiếp hay không
     * $next($request); là thực hiện bước tiếp theo ví dụ như vào controller hoặc là trả về view...
     */
    public function handle(Request $request, Closure $next)
    {
        echo 'test <br>';
        if ($request->is('store')) {
            echo 'Da luu user thanh cong <br>';
        } elseif ($request->is('admin/*') || $request->is('admin')) {
            echo 'Khu vuc admin <br>';
        }
        return $next($request);
    }
}
