<?php

namespace App\Http\Modules\Tickets\DTOs;

class TicketDTO
{
    public int $id;
    public string $title;
    public string $content;

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = ucfirst($title);
    }

    public function wordTransform(string $content): void
    {
        $this->content = ucwords($content);
    }


}
