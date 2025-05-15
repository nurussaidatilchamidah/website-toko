<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rupadana\ApiService\Contracts\HasAllowedFields;
use Rupadana\ApiService\Contracts\HasAllowedSorts;
use Rupadana\ApiService\Contracts\HasAllowedFilters;

class Blog extends Model implements HasAllowedFields, HasAllowedSorts, HasAllowedFilters
{
    protected $fillable = ['title', 'content'];

    public static function getAllowedFields(): array
    {
        return ['id', 'title', 'content', 'created_at'];
    }

    public static function getAllowedSorts(): array
    {
        return ['title', 'created_at'];
    }

    public static function getAllowedFilters(): array
    {
        return ['title'];
    }
}
