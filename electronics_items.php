<?php
require_once('electronic_item.php');
class ElectronicItems extends ElectronicItem{

    private $items = array();

    public function __construct(array $items)
    {
        $this->items = $items;
    }

  
    public function getSortedItems()
    {
        $size =count($this->items);

        for($i=0; $i<$size; $i++){
           
            for($j=$i+1; $j<$size; $j++)
            {
                if($this->items[$i]->price > $this->items[$j]->price)
                {
                    $temp     = $this->items[$i];
                    $this->items[$i] = $this->items[$j];
                    $this->items[$j] = $temp;
                }
            }
        }
        return $this->items;
    }
    /*
    * @return array
    */
    public function getItemsByType($type)
    {
        if (in_array($type, ElectronicItem::$types)){ 
            $items = [];  
            foreach($this->items as $item){
                if($item->type == $type)
                    $items[] = $item;
            }
            return $items;
        }        
        return $false;
    }
}