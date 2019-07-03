<?php

class Twitter {
    public function reTweet($idTweet){
        //retweet a tweet in your timeline
    }
}


interface ISocialShareAdapter {
    public function share($id);
}

class TwitterSocialAdapter implements ISocialShareAdapter {

    private $twitter;
    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }

    public function share($id)
    {
        $this->twitter->reTweet($id);
    }
}