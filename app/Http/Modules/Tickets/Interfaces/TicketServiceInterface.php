<?php

namespace App\Http\Modules\Tickets\Interfaces;

use App\Models\Ticket;
use Illuminate\Support\Collection;

interface TicketServiceInterface
{
    public function getAllTickets(Ticket $ticket):Collection;
    public function getTicketById(): Collection;
    public function search(): Collection;
}
