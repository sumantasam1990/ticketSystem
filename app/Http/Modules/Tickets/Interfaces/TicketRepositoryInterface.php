<?php

namespace App\Http\Modules\Tickets\Interfaces;

use App\Models\Ticket;
use Illuminate\Support\Collection;

interface TicketRepositoryInterface
{
    public function getAllTickets(Ticket $ticket): Collection;
    public function getTicketById(array $ids): Collection;
}
