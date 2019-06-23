<?php


/**
 * When we need to have some algorithms and change it dynamically then we have to use the strategy pattern. In this case,
 * we have defined a strategy to calculate a specific discount. Let's think about a sale and their discounts, using the
 * dependency injection (setMethod) we can change the strategy easily.
 */

interface Strategy {

    public function getDiscount(float $price):float;
}

class PercentDiscount implements Strategy {
    const CURRENT_DISCOUNT = 40; //40% percent
    public function getDiscount(float $price): float
    {
        return $price * (100 / self::CURRENT_DISCOUNT);
    }
}


class QuantityDiscount implements Strategy {
    const CURRENT_DISCOUNT = 100; //100€
    public function getDiscount(float $price): float
    {
        return $price - self::CURRENT_DISCOUNT;
    }
}


class Sale {
    private $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy) : Sale
    {
        $this->strategy = $strategy;
        return $this;
    }

    public function getPriceWithDiscount(float $price) : float
    {
        return $this->strategy->getDiscount($price);
    }
}