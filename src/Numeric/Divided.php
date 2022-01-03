<?php


namespace Maxonfjvipon\Elegant_Elephant\Numeric;


use DivisionByZeroError;
use ElegantBro\Interfaces\Numeric;
use Exception;

final class Divided implements Numeric
{
    private Numeric $first;
    private Numeric $second;

    public function __construct(Numeric $first, Numeric $second)
    {
        $this->first = $first;
        $this->second = $second;
    }

    /**
     * @return string
     * @throws DivisionByZeroError|Exception
     */
    public function asNumber(): string
    {
        try {
            return +$this->first->asNumber() / +$this->second->asNumber();
        } catch (DivisionByZeroError $error) {
            throw $error;
        } catch (Exception $exception) {
        }
    }
}