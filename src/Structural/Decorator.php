<?php

interface IDecoratorOperation {
    public function render(): string;
}

abstract class  OutputDecorator implements  IDecoratorOperation {
    public function render(): string
    {
        return 'BODY';
    }
}


class OutPutMoney extends OutputDecorator{
    private $iDecoratorClient;
    private $money;
    const DEFAULT_MONEY_TEXT = 'WITH MONEY';
    public function setMoney($money){
        $this->money = $money;
    }
    public function __construct(IDecoratorOperation $iDecoratorClient)
    {
        $this->iDecoratorClient = $iDecoratorClient;
        $this->money = self::DEFAULT_MONEY_TEXT;
    }
    public function render(): string
    {
        return sprintf('%s %s', parent::render(), $this->money);
    }
}

class OutPutPrice extends OutputDecorator{
    private $iDecoratorClient;
    private $price;
    const DEFAULT_PRICE_TEXT = 'WITH PRICE';
    public function setPrice($price){
        $this->price = $price;
    }
    public function __construct(IDecoratorOperation $iDecoratorClient)
    {
        $this->iDecoratorClient = $iDecoratorClient;
        $this->price = self::DEFAULT_PRICE_TEXT;
    }
    public function render(): string
    {
        return sprintf('%s %s', parent::render(), $this->price);
    }
}
