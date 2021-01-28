<?php

/**
 * Example event
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 *
 * phpcs:disable Squiz.NamingConventions.ValidVariableName.MemberNotCamelCaps
 */

declare(strict_types=1);

namespace ArtoxLab\BusEventMessage\V1\Events;

class ExampleEvent extends BaseEvent
{

    /**
     * Example event Id
     *
     * @var integer
     */
    public $example_id;

    /**
     * Example event name
     *
     * @var string
     */
    public $example_name;

}
