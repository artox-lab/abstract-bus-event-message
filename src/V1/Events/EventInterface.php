<?php

/**
 * Interface: Event
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\AbstractBusEventMessage\V1\Events;

interface EventInterface
{

    /**
     * Attributes
     *
     * @return array
     */
    public function getAttributes(): array;

    /**
     * Change attributes
     *
     * @param array $props Attributes
     *
     * @return bool
     */
    public function setAttributes(array $props): bool;

    /**
     * Event name
     *
     * @return string
     */
    public function getEventName(): string;

    /**
     * Event Id
     *
     * @return bool|string
     */
    public function getEventId();

    /**
     * Change Event Id
     *
     * @param string $eventId Event Id
     *
     * @return void
     */
    public function setEventId(string $eventId): void;

    /**
     * Previous attributes
     *
     * @return array
     */
    public function getPrevAttributes(): array;

    /**
     * Change previous attributes
     *
     * @param array $prevAttributes Previous attributes
     *
     * @return void
     */
    public function setPrevAttributes(array $prevAttributes = []): void;

    /**
     * Conversion to string
     *
     * @return string
     */
    public function __toString(): string;

}

