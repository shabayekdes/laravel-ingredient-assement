<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlertOrderQuantityMail extends Mailable
{
    use Queueable, SerializesModels;

    private $ingredient;

    /**
     * Create a new message instance.
     */
    public function __construct($ingredient)
    {
        $this->ingredient = $ingredient;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Alert: Ingredient {$this->ingredient->name} Usage Exceeded 50%",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.alert_order_quantity',
            with: ['ingredient' => $this->ingredient]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
