<?php

class Journalist {
   public $role;
   public $name;
   public $section;
}

class IteratorJournalist implements Iterator {

     private $journalist;
     private $position;

     public function __construct($journalist)
     {
         $this->journalist  = $journalist;
         $this->position = 0;
     }

    public function current()
     {
         return $this->journalist[$this->position];
     }

     public function key()
     {
        return $this->position;
     }
     public function next()
     {
         ++$this->position;
     }
     public function rewind()
     {
         $this->position = 0;
     }
     public function valid()
     {
         return isset($this->journalist[$this->position]);
     }
}

class MediaCompany {
    private $totalJournalist;
    private $iteratorClassJournalist;
    public function __construct($iteratorClassJournalist)
    {
        $this->iteratorClassJournalist = $iteratorClassJournalist;
    }

    public function getJournalists(){
        return new $this->iteratorClassJournalist($this->totalJournalist);
    }
}
