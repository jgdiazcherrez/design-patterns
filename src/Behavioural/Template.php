<?php


/**
 *
 * Template method serves to redefine some parts of your algorithm, for example, we have an abstract class that it will
 * has the responsibility to connect, save, calculate vat to some Payment gateway such as Paypal or  Stripe.
 * Obviously, we have a common class in which we will save and calculate the VAT but the connect and the data normalization are
 * different for every specific class. Maybe Paypal uses OAuth2.0 but Stripe doesn't use it.
 * Class PaymentGateWay
 * @author Jonathan Díaz <jgdiazcherrez@gmail.com>
 */
abstract class PaymentGateWay {
    abstract public function connect();
    abstract public function normalizeData($data);

    protected function calculateVat($price){
        //use some algorithm  to calculate it
    }

    protected function save(){
        //save the data on DB
    }
}

class Stripe extends PaymentGateWay {
    public function connect()
    {
        echo 'connect to stripe';
    }

    public function normalizeData($data)
    {
        echo 'we adapt stripe"s data to our model';
    }
}

class PayPal extends PaymentGateWay{

    public function connect()
    {
        echo 'connect to paypal';
    }

    public function normalizeData($data)
    {
        echo 'we adapt paypal"s data to our model';
    }
}