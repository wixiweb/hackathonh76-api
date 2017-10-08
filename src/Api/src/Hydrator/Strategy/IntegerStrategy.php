<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Hydrator\Strategy;

use Zend\Hydrator\Strategy\StrategyInterface;

class IntegerStrategy implements StrategyInterface
{
    /**
     * {@inheritDoc}
     */
    public function extract($value)
    {
        if ( ! is_numeric($value)) {
            return '0';
        }

        return (string)$value;
    }

    /**
     * {@inheritDoc}
     */
    public function hydrate($value)
    {
        if ( ! is_numeric($value)) {
            return 0;
        }

        return intval($value);
    }
}
