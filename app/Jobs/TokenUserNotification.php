<?php

namespace App\Jobs;

use App\Mail\EmailNotificationProvider;
use App\Mail\Model\EmailNotificationProviderSpec;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TokenUserNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $recipient;
    private array $data;

    /**
     * Create a new job instance.
     */
    public function __construct(string $recipient, array $data)
    {
        $this->recipient = $recipient;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $provider_spec = new EmailNotificationProviderSpec(
            subject: "TEA - Notifikasi Permintaan OTP",
            data: $this->data,
            template: "mail.register"
        );
        $provider = new EmailNotificationProvider($provider_spec);
        Mail::to($this->recipient)->send($provider);
    }
}
