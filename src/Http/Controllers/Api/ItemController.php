<?php

namespace sajjadgozal\SimpleCrud\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $class_name = class_basename($request->model);
        $title = 'List of '. $class_name;
        $items = $request->model::all();

        return response()->json([
            'title' => $title,
            'items' => $items,
            'class_name' => $class_name
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $class_name = class_basename($request->model);
        $title = 'Create '.$class_name;
        $model = $request->model;

        return response()->json([
            'title' => $title,
            'model' => $model
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->model->create($request->all());

        return response()->json([
            'message' => 'successfully stored',
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $class_name = class_basename($request->model);
        $title = 'Show '.$class_name;
        $item = $request->item;

        return response()->json([
            'title' => $title,
            'item' => $item
        ],200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        $class_name = class_basename($request->model);
        $title = 'Edit '.$class_name;
        $item = $request->item;

        return response()->json([
            'title' => $title,
            'item' => $item
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $request->item->update($request->all());

        return response()->json([
            'message' => 'successfully updated',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $request->item->delete();

        return response()->json([
            'message' => 'successfully removed',
        ],200);
    }
}
