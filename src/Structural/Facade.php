<?php



class Email  {
    public function send(string $message, string $email, string $subject)
    {
        //send an email using the specific params
    }
}

class WhatsApp {
    public function send(string $message, string $numberTelephone)
    {
        //send a whatsapp using the specific params such as the number
    }
}


/**
 * This class implements the pattern, and we can see that we have two class to send an email an a whatsapp but every class needs
 * a specific parameters, to reduce the complexity and to have a global entry point to implements both subsystems so we will create
 * a new class to control it.
 * Class Facade
 * @author Jonathan Díaz <jgdiazcherrez@gmail.com>
 */
class Facade{


    private $email;
    private $whatsApp;
    public function __construct(Email $email, WhatsApp $whatsApp)
    {
        $this->email = $email;
        $this->whatsApp = $whatsApp;
    }

    public function send(string $message, string $subject, string $email, string $numberTelephone){
        $this->sendEmail($message, $email, $subject);
        $this->sendWhatsApp($message,$numberTelephone);
    }

    private function sendEmail(string $message, string $email, string $subject){
        $this->email->send($message, $email, $subject);
    }

    private function sendWhatsApp(string $message, string $numberTelephone){
        $this->whatsApp->send($message, $numberTelephone);
    }

}