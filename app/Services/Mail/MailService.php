<?php
namespace App\Services\Mail;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class MailService {
    protected $mailer;

    public function __construct() {
        $dsn = sprintf(
            'smtp://%s:%s@%s:%s',
            env('MAIL_USERNAME'),
            env('MAIL_PASSWORD'),
            env('MAIL_HOST'),
            env('MAIL_PORT')
        );
        $transport = Transport::fromDsn($dsn);
        $this->mailer = new Mailer($transport);
    }

    public function sendWelcomeEmail($userEmail, $userName) {
        $html = view('emails.welcome', ['name' => $userName]);
        $email = (new Email())
            ->from(env('MAIL_FROM_ADDRESS', 'hello@example.com'))
            ->to($userEmail)
            ->subject('Welcome to akash')
            ->html($html);

        $this->mailer->send($email);
    }
}
