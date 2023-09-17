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

    public function search(array $criteria): Collection
    {
        $query = $this->model->query();

        $query->when(!empty($criteria['ids']), function ($q) use ($criteria) {
            $q->whereIn('id', $criteria['ids']);
        });

        $query->when(!empty($criteria['title']), function ($q) use ($criteria) {
            $q->where('title', 'like', "%{$criteria['title']}%");
        });

        $query->when(!empty($criteria['content']), function ($q) use ($criteria) {
            $q->where('content', 'like', "%{$criteria['content']}%");
        });

        return $query->get();
    }
}
