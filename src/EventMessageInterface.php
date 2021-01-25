<?php

/**
 * Interface: Event message
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\AbstractBusEventMessage\V1;

interface EventMessageInterface
{

    /**
     * Change attributes
     *
     * @param array $props
     * @return bool
     */
    public function setAttributes(array $props) : bool;

    /**
     * Conversion to string
     *
     * @return string
     */
    public function __toString() : string;

}
