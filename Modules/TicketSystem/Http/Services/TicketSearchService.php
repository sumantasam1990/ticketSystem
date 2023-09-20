<?php

namespace Modules\TicketSystem\Http\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\TicketSystem\Http\Repositories\RepositoryInterface;

class TicketSearchService implements TicketSearchInterface
{
    public RepositoryInterface $repository;

    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Search ticket by id
     *
     * @param array $request
     * @return LengthAwarePaginator
     */
    public function search(array $request): LengthAwarePaginator
    {
        $query = $this->repository->query();
        if (array_key_exists('id', $request)) {
            $query = $this->repository->searchById($query, $request);
        }

        if (array_key_exists('title', $request)) {
            $query = $this->repository->searchByTitle($query, $request);
        }

        return $this->repository->paginate($query, 10);

    }
}
