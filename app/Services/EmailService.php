<?php
/**
 * Created by PhpStorm.
 * User: uiosun
 * Date: 17-12-23
 * Time: 下午1:18
 */

class EmailService
{
    private $email;

    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
    }

    public function send(array $request)
    {
        $this->mail->queue('email.index', $request, function (Message $message) {
            $message->sender(env('MAIL_USERNAME'));
            $message->subject(env('MAIL_SUBJECT'));
            $message->to(env('MAIL_TO_ADDR'));
        });
    }
}