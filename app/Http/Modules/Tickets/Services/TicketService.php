<?php

namespace App\Http\Modules\Tickets\Services;

use App\Http\Modules\Tickets\DTOs\TicketDTO;
use App\Http\Modules\Tickets\Interfaces\TicketRepositoryInterface;
use App\Http\Modules\Tickets\Interfaces\TicketServiceInterface;
use App\Models\Ticket;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;

class TicketService implements TicketServiceInterface
{
    protected TicketRepositoryInterface $ticketRepository;
    protected array $ids;
    protected $title = '';
    protected $content = '';

    public function setIds(array $ids): TicketServiceInterface
    {
        $this->ids = $ids;
        return $this;
    }

    public function setTitle(string $title): TicketServiceInterface
    {
        $this->title = $title;
        return $this;
    }

    public function setContent(string $content): TicketServiceInterface
    {
        $this->content = $content;
        return $this;
    }

    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }
    public function getAllTickets(Ticket $ticket): Collection
    {
        $data = $this->ticketRepository->getAllTickets($ticket);
        return $data->map(function ($post) {
            $postDTO = new TicketDTO();
            $postDTO->setTitle($post->title);
            $postDTO->id = $post->id;
            $postDTO->content = $post->content;
            return $postDTO;
        });
    }

    public function getTicketById(): Collection
    {
        $tickets = $this->ticketRepository->getTicketById($this->ids);

        return $tickets->map(function ($ticket) {
            $ticketDTO = new TicketDTO();
            $ticketDTO->id = $ticket->id;
            $ticketDTO->setTitle($ticket->title);
            $ticketDTO->wordTransform($ticket->content);
            return $ticketDTO;
        });
    }

    public function search(): Collection
    {
        // Start with a base query
        $query = Ticket::query();

        // Use the `when` method to conditionally apply query constraints
        $query->when(!empty($this->ids), function ($q) {
            return $q->whereIn('id', $this->ids);
        });

        $query->when(!empty($this->title), function ($q) {
            return $q->where('title', 'like', "%{$this->title}%");
        });

        $query->when(!empty($this->content), function ($q) {
            return $q->where('content', 'like', "%{$this->content}%");
        });

        return $query->get();
    }
}
