<?php

namespace sajjadgozal\SimpleCrud\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use sajjadgozal\SimpleCrud\Http\Requests\StoreItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = $request->attributes->get('model');

        $class_name = class_basename($model);

        $title = 'List of '. $class_name;

        $items = $request->model::all();

        if (view()->exists($class_name.'.index')
            || view()->exists(strtolower( $class_name).'.index')) {
            $view = $class_name.'.index';
        } else {
            $view = 'sg::universal.index';
        }

        return view($view, [
            'title' => $title,
            'items' => $items,
            'class_name' => $class_name
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $model = $request->attributes->get('model');

        $class_name = class_basename($model);

        $title = 'Create '.$class_name;

        if (view()->exists($class_name.'.create')
            || view()->exists(strtolower( $class_name).'.create')) {
            $view = $class_name.'.create';
        } else {
            $view = 'sg::universal.create';
        }
        
        return view($view, [
            'title' => $title,
            'model' => $model
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreItemRequest $request)
    {
        $model = $request->attributes->get('model');

        $model->create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $model = $request->attributes->get('model');

        $class_name = class_basename($model);

        $title = 'Show '.$class_name;

        $item = $request->item;
        if (view()->exists($class_name.'.show')
        || view()->exists(strtolower( $class_name).'.show')) {
            $view = $class_name.'.show';
        } else {
            $view = 'sg::universal.show';
        }

        return view($view, [
            'title' => $title,
            'item' => $item
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $model = $request->attributes->get('model');

        $class_name = class_basename($model);

        $title = 'Edit '.$class_name;
        $item = $request->item;

        if (view()->exists($class_name.'.edit')
            || view()->exists(strtolower( $class_name).'.edit')) {
            $view = $class_name.'.edit';
        } else {
            $view = 'sg::universal.edit';
        }

        return view($view, [
            'title' => $title,
            'item' => $item
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->item->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->item->delete();
        return redirect()->back();
    }
}
