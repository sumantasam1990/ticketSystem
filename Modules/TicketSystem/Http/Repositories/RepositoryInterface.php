<?php

namespace Modules\TicketSystem\Http\Repositories;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function query(): Builder;
    public function get(Builder $builder): Collection;
    public function paginate(Builder $builder, int $perPage): LengthAwarePaginator;
}
