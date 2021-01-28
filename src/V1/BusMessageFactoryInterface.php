<?php

/**
 * Interface: Bus message factory
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\AbstractBusEventMessage\V1;

interface BusMessageFactoryInterface
{

    /**
     * Create bus message instance
     *
     * @param string $message Message
     *
     * @return BusMessageInterface
     */
    public function create(string $message = ''): BusMessageInterface;

}
