<?php

namespace App\Http\Controllers;

use App\Http\Modules\Tickets\Interfaces\TicketServiceInterface;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected TicketServiceInterface $ticketService;

    public function __construct(TicketServiceInterface $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function getAllTickets(Ticket $ticket): JsonResponse
    {
        $tickets = $this->ticketService->getAllTickets($ticket);

        return response()->json([
            'data' => $tickets,
        ], 200);
    }

    public function getTicketsByIds(Request $request): JsonResponse
    {
        $tickets = $this->ticketService
            ->setIds($request->input('ids'))
            ->getTicketById();

        return response()->json([
            'data' => $tickets,
        ], 200);
    }

    public function search(Request $request): JsonResponse
    {
        $ids = $request->input('ids', []);
        $title = $request->input('title', '');
        $content = $request->input('content', '');

        // Use the service in a builder-like way to set criteria and perform the search
        $tickets = $this->ticketService
            ->setIds($ids)
            ->setTitle($title)
            ->setContent($content)
            ->search();

        // Return the search results as a response
        return response()->json($tickets);
    }
}
