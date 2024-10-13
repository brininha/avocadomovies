<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class contatoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $destinatario;
    public $mensagem;

    public function __construct($destinatario, $mensagem)
    {
        $this->destinatario = $destinatario;
        $this->mensagem = $mensagem; // Armazena a mensagem
    }

    public function build()
    {
        return $this->from(['address' => 'sabrina.cristan@gmail.com', 'name' => 'Avocado Movies'])
                    ->to($this->destinatario) // Define o destinatário
                    ->subject('Resposta à mensagem')
                    ->view('emails/contato')
                    ->with(['mensagem' => $this->mensagem]); // Passa a mensagem para a view
    }
}
