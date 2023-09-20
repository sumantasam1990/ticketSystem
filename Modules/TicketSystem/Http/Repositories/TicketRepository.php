<?php

namespace Modules\TicketSystem\Http\Repositories;

use App\Models\Ticket;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class TicketRepository implements RepositoryInterface
{
    public function query(): Builder
    {
        return Ticket::query();
    }

    public function get(Builder $builder): Collection
    {
        return $builder->get();
    }

    public function paginate(Builder $builder, int $perPage): LengthAwarePaginator
    {
        return $builder->paginate($perPage);
    }

    public function getAll(): Collection
    {
        return Ticket::all();
    }

    /**
     * Search by id
     *
     * @param Builder $builder
     * @param array $request
     * @return Builder
     */
    public function searchById(Builder $builder, array $request): Builder
    {
        return $builder
            ->where('id', array_key_exists('id', $request) ? $request['id'] : '');
    }

    /**
     * Search by title
     *
     * @param Builder $builder
     * @param array $request
     * @return Builder
     */
    public function searchByTitle(Builder $builder, array $request): Builder
    {
        return $builder
            ->where('title', 'like', array_key_exists('title', $request) ? '%' . $request['title'] . '%' : '');
    }
}
