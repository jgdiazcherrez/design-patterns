<?php

/**
 * When we have an objects with dynamically  behaviour based on a determinate state we have to use the state pattern.
 * This examples shows how to implement it, let's think about a chat that must has  two states: active and inactive.
 * When a chat is active we can send a message but when a chat is inactive we can't send any message (throw exception)
 */


class Chat {
    private $state;
    public function __construct(StateChat $state)
    {
        $this->state = $state;
    }

    public function createMessage($text){
        $this->state->handleMessage($text);
    }

    public function setState(StateChat $state){
        $this->state = $state;
        return $this;
    }
}

/**
 * Interface StateChat
 */
interface StateChat {
    public  function  handleMessage($text);
}


class ActiveChat implements StateChat{

     private $context;
     public function __construct(Chat $context)
     {
         $this->context = $context;
     }

     public function handleMessage($text)
     {
         echo 'create and publish message';
     }
}

class InactiveChat implements StateChat{

    /**
     * @param $message
     * @throws Exception
     */
    public function handleMessage($message)
    {
        throw new Exception("Chat is inactive, you can't send any message");
    }
}
