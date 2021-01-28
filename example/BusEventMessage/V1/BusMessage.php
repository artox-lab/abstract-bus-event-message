<?php

/**
 * Bus event message
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

namespace BusEventMessage\V1;

use ArtoxLab\AbstractBusEventMessage\V1\BusMessageInterface;
use ArtoxLab\AbstractBusEventMessage\V1\Events\EventInterface;
use InvalidArgumentException;

class BusMessage implements BusMessageInterface
{

    /**
     * Event type
     *
     * @var string
     */
    public $type;

    /**
     * Event version
     *
     * @var string
     */
    public $version = 'v1';

    /**
     * Event action (created/updated/deleted)
     *
     * @var string
     */
    public $action;

    /**
     * Event data
     *
     * @var EventInterface
     */
    public $data;

    /**
     * EntityMessage constructor.
     *
     * @param string $message Message
     */
    public function __construct(string $message = '')
    {
        if (false === empty($message)) {
            $this->setAttributes(json_decode($message, true));
        }
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
            if (false === property_exists($this, $name)) {
                throw new InvalidArgumentException(
                    sprintf('Unexpected property %s', $name)
                );
            }

            if ($name === 'data') {
                if (true === empty($props['type'])) {
                    throw new InvalidArgumentException('Required property "type" cannot be empty');
                }

                if (true === empty($props['version'])) {
                    throw new InvalidArgumentException('Required property "version" cannot be empty');
                }

                $className = 'BusEventMessage\\' . ucfirst($props['version']) . '\\Events\\' . $props['type'];

                if (false === class_exists($className)) {
                    throw new InvalidArgumentException(
                        sprintf('Entity class %s not found', $className)
                    );
                }

                $entity = new $className();
                $entity->setAttributes($value);

                $this->$name = $entity;
            } else {
                $this->$name = $value;
            }
        }

        return true;
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
