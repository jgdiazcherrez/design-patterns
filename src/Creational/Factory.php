<?php


/**
 * This file shows an example of the Factory patten in which we are creating instance of a specific service. Let's think
 * about two services, Audio and Video, they have a media content and we have to save its date and a price.
 *
 */


abstract class Service
{
    protected $ts;
    protected $price;
    protected $content;
    public function __construct(int $ts, float $price, $content)
    {
        $this->ts = $ts;
        $this->price = $price;
        $this->content = $content;
    }
}

class MediaContent
{

}

class Audio extends  Service
{

}

class Video extends Service
{
}

/**
 * This class implements the pattern, we have a centralized class that it will have the responsibility to create a instance
 * depending the type or our necessity. If we want to change or add a new attribute to the service we will have to change
 * the factory.
 *
 * Class FactoryService
 * @author  Jonathan Díaz <jgdiazcherrez@gmail.com>
 */
class FactoryService
{
    const AUDIO_SERVICE = '1';
    const VIDEO_SERVICE = '2';

    /**
     * Factory Create Method
     * @param string $type
     * @param int $ts
     * @param float $price
     * @param MediaContent $content
     * @return Audio|Video|null
     * @throws Exception
     */
    public static function create(string $type, int $ts, float $price, MediaContent $content)
    {
        $instanceService = null;
        switch ($type) {
            case self::AUDIO_SERVICE :
                $instanceService = new Audio($ts, $price, $content);
                break;
            case self::VIDEO_SERVICE:
                $instanceService = new Video($ts, $price, $content);
                break;
            default:
                throw new Exception("It doesn't support the type of instance");
                break;
        }
        return $instanceService;
    }
}