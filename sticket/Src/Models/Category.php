<?php

namespace Sticket\Src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sticket\Src\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    public static function newFactory()
    {
        return new CategoryFactory();
    }

    protected $guarded = [];
}
