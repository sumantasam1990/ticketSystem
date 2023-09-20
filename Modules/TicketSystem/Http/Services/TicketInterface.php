<?php

namespace Modules\TicketSystem\Http\Services;


use Illuminate\Support\Collection;

interface TicketInterface
{
    /**
     * Get All tickets
     *
     * @return Collection
     */
    public function getTickets(): Collection;
}
