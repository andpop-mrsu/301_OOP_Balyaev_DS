<?php

namespace Task02;

class Fraction
{
    private $numer;
    private $demo;

    public function __construct(int $numer, int $demo)
    {
        if ($demo == 0) {
            throw new \InvalidArgumentException('Знаменатель не может быть равен 0.');
        }

        $this->numer = $numer;
        $this->demo = $demo;
        $this->reduceFraction();
    }

    public function getNumer(): int
    {
        return $this->numer;
    }

    public function getDenom(): int
    {
        return $this->demo;
    }

    public function add(Fraction $frac): Fraction
    {
        $newNumer = ($this->getNumer() * $frac->getDenom()) + ($this->getDenom() * $frac->getNumer());
        $newDemo = $this->demo * $frac->getDenom();

        $sumFravtion = new Fraction($newNumer, $newDemo);

        return $sumFravtion;
    }

    public function sub(Fraction $frac): Fraction
    {
        $newNumer = ($this->getNumer() * $frac->getDenom()) - ($this->getDenom() * $frac->getNumer());
        $newDemo = $this->getDenom() * $frac->getDenom();

        $subFravtion = new Fraction($newNumer, $newDemo);

        return $subFravtion;
    }

    public function __toString()
    {
        if (abs($this->getNumer()) > $this->getDenom()) {
            $wholePart = intdiv($this->getNumer(), $this->getDenom());
            $remainder = abs($this->getNumer() % $this->getDenom());
            $stringFraction = "$wholePart`$remainder/$this->demo";
        } else {
            $stringFraction = "$this->numer/$this->demo";
        }

        return $stringFraction;
    }

    private function reduceFraction()
    {
        $gcd = $this->gcd($this->getNumer(), $this->getDenom());
        if ($gcd != 1) {
            $this->numer /= $gcd;
            $this->demo /= $gcd;
        }

        if (($this->getNumer() < 0) && ($this->getDenom() < 0)) {
            $this->numer = abs($this->getNumer());
            $this->demo = abs($this->getDenom());
        } elseif ($this->demo < 0) {
            $this->numer = - ($this->getNumer());
            $this->demo = abs($this->getDenom());
        }
    }

    private function gcd($a, $b): int
    {
        while ($b != 0) {
            $temp = $a % $b;
            $a = $b;
            $b = $temp;
        }
        return $a;
    }
}
