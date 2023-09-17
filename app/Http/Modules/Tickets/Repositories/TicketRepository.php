<?php

namespace App\Http\Modules\Tickets\Repositories;

use App\Http\Modules\Tickets\Interfaces\TicketRepositoryInterface;
use App\Models\Ticket;
use Illuminate\Support\Collection;

class TicketRepository extends AbstractRepository implements TicketRepositoryInterface
{
    public function __construct(Ticket $ticket)
    {
        parent::__construct($ticket);
    }

    public function getAllTickets(Ticket $ticket): Collection
    {
        return $this->model->all();
    }

    public function getTicketById(array $ids): Collection
    {
        return $this->model->whereIn('id', $ids)->get();
    }
}
