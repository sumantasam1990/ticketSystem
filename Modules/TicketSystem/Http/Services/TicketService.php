<?php

namespace Modules\TicketSystem\Http\Services;

use Illuminate\Support\Collection;
use Modules\TicketSystem\Http\Repositories\RepositoryInterface;
use Modules\TicketSystem\Http\Services\TicketInterface;

class TicketService implements TicketInterface
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
     * Get All tickets
     *
     * @return Collection
     */
    public function getTickets(): Collection
    {
        return $this->repository->getAll();
    }
}
