<?php

namespace App\EventDispatcher;

use Psr\Log\LoggerInterface;
use App\Event\ProductViewEvent;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;


class ProductViewEmailSubscriber implements EventSubscriberInterface
{
    protected $mailer;
    protected $logger;

    public function __construct(LoggerInterface $logger, MailerInterface $mailer)
    {
        $this->logger = $logger;
        $this->mailer = $mailer;
    }
    public static function getSubscribedEvents()
    {
        return [
            'product.view' => 'sendEmail'
        ];
    }
    public function sendEmail(ProductViewEvent $productViewEvent)
    {
        //Créons un objet email à qui on veut passer un template twig
        //$email = new TemplatedEmail();
        //
        //$email->from(new Address("contact@mail.com", "Infos de la boutique"))
        //  ->to("admin@mail.com")
        //->text("un visiteur est en train de voir la page de produit n°" . $productViewEvent->getProduct()->getId())
        //->htmlTemplate('emails/product_view.html.twig')
        //comme avec le render on peut lui passer des variables en definissant le contexte
        //->context([
        //  'product' => $productViewEvent->getProduct()
        //])
        //->subject("Visite du produit n°" . $productViewEvent->getProduct()->getId());
        //$this->mailer->send($email);


        $this->logger->info("Email envoyé à l'admin pour le produit" . $productViewEvent->getProduct()->getId());
    }
}
