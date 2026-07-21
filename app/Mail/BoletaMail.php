<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BoletaMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $codigoPedido;
    public string $pdfContenido; // contenido binario del PDF

    /**
     * @param string $codigoPedido  Código de la boleta (ej: CAJ-ABC123)
     * @param string $pdfContenido  Contenido binario (raw) del PDF ya decodificado
     */
    public function __construct(string $codigoPedido, string $pdfContenido)
    {
        $this->codigoPedido = $codigoPedido;
        $this->pdfContenido = $pdfContenido;
    }

    public function build()
    {
        return $this->subject("Tu boleta de compra {$this->codigoPedido} - D'Ennita Supermercado")
            ->view('emails.boleta')
            ->attachData($this->pdfContenido, "Boleta_DEnnita_{$this->codigoPedido}.pdf", [
                'mime' => 'application/pdf',
            ]);
    }
}
