<?php


class ElectronicItem {

    public $price;
    public $type;
    public $wired;
    public $item;
    public $extras = [];
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_TELEVISION = 'television';

    public static $types = array(self::ELECTRONIC_ITEM_CONSOLE, self::ELECTRONIC_ITEM_TELEVISION, self::ELECTRONIC_ITEM_MICROWAVE);
    public function __construct($item,$price)
    {
        $this->setItem($item);
        $this->setPrice($price);
        $this->setType(self::$types[$item]);

    }

    function getPrice() {
        return $this->price;
    }
    function getItem() {
        return $this->item;
    }
    function getType(){
        return $this->type;
    }

    function getExtras(){
        return $this->extras;
    }
    function getWired(){
        return $this->wired;    
    }
     
    function setWired($wired) {
        $this->wired = $wired;
    }

    function setPrice($price){
        $this->price = $price;
    }

    function setType($type){
        $this->type = $type;
    }

    function setItem($item){
        if($item == 0)       
            $this->item = self::ELECTRONIC_ITEM_CONSOLE;
        else if($item == 1)
            $this->item = self::ELECTRONIC_ITEM_TELEVISION;
        else if($item == 2)
            $this->item = self::ELECTRONIC_ITEM_MICROWAVE;
        
        return $this->item;
    }

    function setExtras($object){
        $this->extras[] = $object;
    }


    function maxExtras(){
        if($this->item == 'console')
            return 4;
        else if($this->item == 'television')
            return -1;
        return 0;
    }
}