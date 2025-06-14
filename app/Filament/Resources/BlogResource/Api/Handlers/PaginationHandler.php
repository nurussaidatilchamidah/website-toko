<?php
namespace App\Filament\Resources\BlogResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\BlogResource;
use App\Filament\Resources\BlogResource\Transformers\YourTransformerClass;

class PaginationHandler extends Handlers {
    public static bool $public = true;
    public static string | null $uri = '/';
    public static string | null $resource = BlogResource::class;

    /**
     * List of {{ model }}
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function handler()
    {
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for($query)
            ->allowedFields($this->getAllowedFields() ?? [])
            ->allowedSorts($this->getAllowedSorts() ?? [])
            ->allowedFilters($this->getAllowedFilters() ?? [])
            ->allowedIncludes($this->getAllowedIncludes() ?? [])
            ->paginate(request()->query('per_page'))
            ->appends(request()->query());

        return YourTransformerClass::collection($query);  // Replace with actual transformer class
    }
}
