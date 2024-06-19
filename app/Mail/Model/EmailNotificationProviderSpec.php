<?php

namespace App\Mail\Model;

class EmailNotificationProviderSpec
{
    public string $subject;
    public array $data;
    public string $template;
    public array $attachment;

    public function __construct(string $subject, array $data, string $template, array $attachment = [])
    {
        $this->subject = $subject;
        $this->data = $data;
        $this->template = $template;
        $this->attachment = $attachment;
    }
}
