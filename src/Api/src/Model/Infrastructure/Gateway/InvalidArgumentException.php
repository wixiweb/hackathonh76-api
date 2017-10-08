<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Model\Infrastructure\Gateway;

use InvalidArgumentException as ParentException;

class InvalidArgumentException extends ParentException
{
    /**
     * @param string $className
     * @param mixed $givenValue
     * @return InvalidArgumentException
     */
    static public function expected($className, $givenValue)
    {
        return new self(sprintf(
            'Expected %s; given %s',
            $className,
            gettype($givenValue) === 'object'
                ? get_class($givenValue)
                : gettype($givenValue)
        ));
    }
}
