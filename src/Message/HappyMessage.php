<?php
namespace App\Message;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * Class SendNotification
 * @package App\Message
 */
class HappyMessage
{
    /**
     * @Groups({"happy_queue_group"})
     */
    private $message;

    /**
     * No Serialization group => it will not be sent to queue
     */
    private $gift;

    /**
     * HappyMessage constructor.
     *
     * @param null $message
     * @param null $gift
     */
    public function __construct($message = null, $gift = null)
    {
        $this->message = $message;
        $this->gift = $gift;
    }
    /**
     * @return null
     */
    public function getMessage()
    {
        return $this->message;
    }
    /**
     * @return null
     */
    public function getGift()
    {
        return $this->gift;
    }
}