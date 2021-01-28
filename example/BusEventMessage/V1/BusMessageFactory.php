<?php

/**
 * Factory: Bus message
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace BusEventMessage\V1;

use ArtoxLab\AbstractBusEventMessage\V1\BusMessageFactoryInterface;
use ArtoxLab\AbstractBusEventMessage\V1\BusMessageInterface;
use JsonException;

class BusMessageFactory implements BusMessageFactoryInterface
{

    /**
     * Create bus message instance
     *
     * @param string $message Message
     *
     * @throws JsonException
     *
     * @return BusMessageInterface
     */
    public function create(string $message = ''): BusMessageInterface
    {
        return new BusMessage($message);
    }

}
