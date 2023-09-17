<?php

namespace App\Http\Modules\Tickets\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected Model $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }
}
