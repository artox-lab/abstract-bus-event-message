<?php

/**
 * Base event
 *
 * Extend this class to add your attributes
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

namespace ArtoxLab\BusEventMessage\V1\Events;

use ArtoxLab\AbstractBusEventMessage\V1\Events\EventInterface;

class BaseEvent implements EventInterface
{
    /**
     * Attributes before change
     *
     * @var array
     */
    public $prevAttributes = [];

    /**
     * Event Id
     *
     * @var boolean|string
     */
    public $eventId;

    /**
     * BaseEvent constructor.
     */
    public function __construct()
    {
        $this->eventId = substr(
            hash(
                'md5',
                getmypid() . strtotime("today")
            ),
            0,
            32
        );
    }

    /**
     * Attributes
     *
     * @return array
     */
    public function getAttributes(): array
    {
        $attributes = get_object_vars($this);
        unset($attributes['prevAttributes']);

        return $attributes;
    }

    /**
     * Change attributes
     *
     * @param array $props Attributes
     *
     * @return bool
     */
    public function setAttributes(array $props): bool
    {
        foreach ($props as $name => $value) {
            if (true === property_exists($this, $name)) {
                $this->$name = $value;
            }
        }

        return true;
    }

    /**
     * Event name
     *
     * @return string
     */
    public function getEventName(): string
    {
        return substr(
            static::class,
            (strripos(static::class, "Events\\") + 7),
            strlen(static::class)
        );
    }

    /**
     * Event Id
     *
     * @return bool|string
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Change Event Id
     *
     * @param string $eventId Event Id
     *
     * @return void
     */
    public function setEventId(string $eventId): void
    {
        $this->eventId = $eventId;
    }

    /**
     * Previous attributes
     *
     * @return array
     */
    public function getPrevAttributes(): array
    {
        return $this->prevAttributes;
    }

    /**
     * Change previous attributes
     *
     * @param array $prevAttributes Previous attributes
     *
     * @return void
     */
    public function setPrevAttributes(array $prevAttributes = []): void
    {
        $this->prevAttributes = $prevAttributes;
    }

    /**
     * Conversion to string
     *
     * @return string
     */
    public function __toString(): string
    {
        return json_encode(get_object_vars($this));
    }

}
