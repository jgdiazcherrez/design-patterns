<?php

class Subject implements SplSubject{
    private $observerList;
    public function __construct()
    {
        $this->observerList = [];
    }

    public function attach(SplObserver $observer)
    {
        $this->observerList[get_class($observer)] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        unset($this->observerList[get_class($observer)]);
    }
    public function notify()
    {
        foreach ($this->observerList as $itemObserver){
            $itemObserver->update($this);
        }
    }
}

class VideoContent extends Subject {
    private $versionString;

    public function getCurrentVersionString(){
        return $this->versionString;
    }
    public function createVersion($string){
        $this->versionString = $string;
        $this->notify();
    }
}




class User implements SplObserver{

    public function update(SplSubject $subject)
    {
        $this->sendEmail(sprintf('We have published a new version %s', $subject->getCurrentVersion()));
    }

    public function sendEmail($text){
        echo 'send an email with text:' . $text;
    }
}