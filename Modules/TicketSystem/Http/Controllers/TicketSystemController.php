<?php

namespace Modules\TicketSystem\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\TicketSystem\Http\Services\TicketInterface;
use Modules\TicketSystem\Http\Services\TicketSearchInterface;
use Modules\TicketSystem\Http\Services\TicketSearchService;

class TicketSystemController extends Controller
{
    public TicketInterface $ticketService;
    public TicketSearchInterface $ticketSearchService;

    /**
     * @param TicketInterface $ticketService
     * @param TicketSearchService $ticketSearchService
     */
    public function __construct(TicketInterface $ticketService, TicketSearchService $ticketSearchService)
    {
        $this->ticketService = $ticketService;
        $this->ticketSearchService = $ticketSearchService;
    }


    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request): Renderable
    {
        $data = $this->ticketService->getTickets();
        return view('ticketsystem::index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ticketsystem::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ticketsystem::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ticketsystem::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Search tickets
     *
     * @param Request $request
     * @return Renderable
     */
    public function search(Request $request): Renderable
    {
        $data = $this->ticketSearchService->search($request->all());
        return view('ticketsystem::index', ['data' => $data]);
    }
}
