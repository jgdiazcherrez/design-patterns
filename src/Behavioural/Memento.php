<?php


/**
 * Sometimes we have to do some calculations, a great example is the fibonacci succession, so we are forcing to consume a lot of
 * CPU to calculate it and it will cost a lot of time to get it . With this class we can storage in memory to easily to get it the next time without waiting again to calculate it.
 * Moreover, we have added a ttl to delete automatically the content
 * Class Memento
 * @author Jonathan Díaz <jgdiazcherrez@gmail.com>
 */
class Memento {
    private static $i;
    private $data;
    private $disabled;
    protected function __construct()
    {
        $this->data = [];
        $this->disabled = false;
    }

    /**
     * Flag to disable it and implements method chaining
     * @param bool $status
     * @return $this
     */
    public function disable(bool $status){
        $this->disabled = $status;
        return $this;
    }

    public function setItemData(string $key, $data, int $ttl){
        if(!$this->disabled){
            $this->data[$key] = [
                "content" => $data,
                "ttl" => $ttl
            ];
        }
    }
    public function getTtl(int $seconds = 0){
        return time() + $seconds;
    }

    public function getItemData($key){
        $currentTimeStamp = time();
        $data = null;
        if($this->data[$key]){
            if($this->data[$key]['ttl'] <= $currentTimeStamp){
                $data = $this->data[$key]['content'];
            }
            else{
                unset($this->data[$key]);
            }
        }
        return $data;
    }

    /**
     * Use singleton pattern to create it
     * @return Memento
     */
    public static function getInstance(){
        if(!self::$i){
            self::$i = new Memento();
        }
        return self::$i;
    }



}