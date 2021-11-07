<?php

namespace  Sajjadgozal\SimpleCrud\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;
use Sajjadgozal\SimpleCrud\service\Resolve;

class ExtractItem extends Middleware
{

    /**
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $model = Resolve::modelName($request->item_name);
        if (! $model) {
            return abort(404,'model does not exist');
        }

        $request->model = $model;

        if (! $model->hasCrud) {
            return abort(404,'model not connected to simple crud package');
        }

        if($request->id) {
            $item = Resolve::getItemById($model ,$request->id);
            $request->item = $item;

            if(! $item) {
                return abort(404,'item does not exist');
            }
        }

        return $next($request);
    }
}
