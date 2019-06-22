<?php

interface IOperation{
    public function play();
}

class Video implements IOperation {
    public function play()
    {
        echo 'play current video';
    }
}

/**
 * This class implements the pattern. We just have to create a class as a bridge between the real object. The proxy will
 * control the operation that we have defined on the interface. This examples shows how to control a video reproduction
 * without changing the main class.
 *
 * Class VideoProxy
 *
 * @author Jonathan Diaz <jgdiazcherrez@gmail.com>
 */
class VideoProxy implements IOperation {

    private $realVideo;
    private $count;
    public function __construct(IOperation $realVideo)
    {
        $this->realVideo = $realVideo;
        $this->count = 0;
    }


    /**
     * @throws Exception
     */
    public function play()
    {
        if($this->count > 5){
            throw new Exception('You have exceed the limit');
        }
        $this->count++;
        $this->realVideo->play();
    }
}