<?php

namespace App\Mail;

use App\Mail\Model\EmailNotificationProviderSpec;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailNotificationProvider extends Mailable
{
    use Queueable, SerializesModels;

    public array $payload;
    public array $attachment;
    private EmailNotificationProviderSpec $spec;

    /**
     * Create a new message instance.
     */
    public function __construct(EmailNotificationProviderSpec $spec)
    {
        $this->spec = $spec;
        $this->payload = ["content" => $spec->data];
        $this->attachment = $spec->attachment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->spec->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        return new Content(
            view: $this->spec->template,
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments()
    {
        return $this->attachment ? [
            Attachment::fromData(
                fn() => $this->attachment["file"],
                $this->attachment["fileName"]
            )->withMime($this->attachment["mimeType"]),
        ] : [];
    }
}
