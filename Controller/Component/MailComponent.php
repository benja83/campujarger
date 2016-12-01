<?php

class MailComponent extends Component {

    public function sendEmailConfirmationFor($offer)
    {
        App::uses('CakeEmail', 'Network/Email');

        $Email = new CakeEmail();
        $Email->config('gmail')
            ->to($this->receiver($offer))
            ->subject('Your job offer')
            ->send($this->message() . $this->offer_link($offer));
    }

    private function receiver($offer)
    {
        return $offer['Offer']['creator_email'];
    }

    private function offer_link($offer)
    {
        return $this->host() . $this->webroot . $this->uri($offer) . $this->token_param($offer);
    }

    private function host()
    {
        $url = explode('/',$_SERVER['HTTP_REFERER']);
        $url = array_splice($url,0, count($url)-2);
        return join('/',$url) . '/';
    }

    private function uri($offer)
    {
        return "offers/view/" . $offer['Offer']['id'];
    }

    private function token_param($offer)
    {
        return "?token=" . $offer['Offer']['token'];
    }

    private function message()
    {
        return "Your order has been created\nFollow the following link to edit your job offer\n" ;
    }


}
