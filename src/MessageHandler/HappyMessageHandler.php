<?php

namespace App\MessageHandler;
use App\Message\HappyMessage;

/**
 * Class HappyMessageHandler
 * @package App\MessageHandler
 */
class HappyMessageHandler
{
    /**
     * @param HappyMessage $message
     */
    public function __invoke(HappyMessage $message)
    {
        echo $message->getMessage() . " -> and get the gift -> " . $message->getGift();
    }
}