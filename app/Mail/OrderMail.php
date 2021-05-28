<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'info@fresheat.in';
        $name = 'Order Details';
        $order_id = $this->data['order_id'];      
        $subject = "Order Details - Fresh Eat";

        return $this->from($address, $name)
            ->subject($subject)
            ->with([
                'order_id' => $order_id,
            ])
            ->view('mail.order');
    }

}
