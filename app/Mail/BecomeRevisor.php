<?php

namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class BecomeRevisor extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     */

    
    public function makeRevisor(User $user)
    {
        Artisan::call('rapido:makeUserRevisor',['email'=>$user->email]);
        return redirect()->route('home')->withMessage(['type'=>'success','text'=>'Ya tenemos un compañero más']);
    }
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */


    public function build()
    {
        return $this->from('shoplify.revisor@noreply.es')->view('mail.become-revisor');
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Become Revisor',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            //view: 'view.name',
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
