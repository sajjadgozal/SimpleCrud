<?php

namespace sajjadgozal\SimpleCrud\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;
use sajjadgozal\SimpleCrud\service\Resolve;

class ExtractModel extends Middleware
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

        $request->attributes->add(['model' => $model]);

        return $next($request);
    }
}
