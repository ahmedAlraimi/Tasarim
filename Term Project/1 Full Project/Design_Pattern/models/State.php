<?php

namespace models;

class State
{
    const STATE_OPEN = 'available';
    const STATE_CLOSE = 'sold';

    /**
     * @var string
     */
    private $state;

    /**
     * @var string[]
     */
    private static $validStates = [
        self::STATE_OPEN,
        self::STATE_CLOSE,
    ];

    /**
     * @param string $state
     */
    public function __construct(string $state)
    {
        self::ensureIsValidState($state);

        $this->state = $state;
    }

    private static function ensureIsValidState(string $state)
    {
        if (!in_array($state, self::$validStates)) {
            throw new \InvalidArgumentException('Invalid state given');
        }
    }

    public function __toString(): string
    {
        return $this->state;
    }
}


?>