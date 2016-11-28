<?php

class MailComponent extends Component {

    public function sendEmailTo($email)
    {
        App::uses('CakeEmail', 'Network/Email');
        $Email = new CakeEmail();
        $Email->config('gmail')
            ->to($email)
            ->subject('Your job offer')
            ->send('Your order has been created');
    }
}
