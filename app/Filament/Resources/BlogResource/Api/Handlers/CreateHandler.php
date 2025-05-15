<?php
namespace App\Filament\Resources\BlogResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\BlogResource;
use App\Filament\Resources\BlogResource\Api\Requests\CreateBlogRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = BlogResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Blog
     *
     * @param CreateBlogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateBlogRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}