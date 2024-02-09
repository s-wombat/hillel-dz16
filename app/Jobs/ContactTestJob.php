<?php

namespace App\Jobs;

use App\Mail\ContactForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ContactTestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected array $contactForm
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to("admin@example.com")->send(new ContactForm($this->contactForm));
    }
}
