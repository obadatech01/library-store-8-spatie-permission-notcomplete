<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use Illuminate\Http\Request;

class HasCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $count = Category::all()->count();
        if($count == 0){
            $notification = array(
                'message' => 'لم يتم إضافة أقسام بعد، أضف أقسام أولًا',
                'alert-type' => 'error'
            );

            return redirect()->route('categories.index')->with($notification);
        }
        return $next($request);
    }
}
