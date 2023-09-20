<?php

namespace Modules\TicketSystem\Http\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TicketSearchInterface
{
    /**
     * Search ticket by id
     *
     * @param array $request
     * @return LengthAwarePaginator
     */
    public function search(array $request): LengthAwarePaginator;
}
