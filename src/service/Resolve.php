<?php

namespace sajjadgozal\SimpleCrud\service;

class Resolve {

    /**
     * @param String $model_name
     *
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    public static function modelName(String $model_name)
    {
        try{
            $model_name = ucwords($model_name);
            return app("App\Models\\$model_name");
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * @param $model
     * @param String $id
     *
     * @return mixed
     */
    public static function getItemById($model , String $id)
    {
        return $model->find($id);
    }
}