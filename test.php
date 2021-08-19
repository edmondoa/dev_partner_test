<?php
require_once('electronic_item.php');
require_once('electronics_items.php');

$items = [];
$terminate = false;
$option_extra = ['r'=>'remote controller','w'=>'wire controller'];
while(!$terminate){
    echo "What do you want to input [0] - console [1] - television [2] - microwave ? ";
    $selected = rtrim(fgets(STDIN));
    echo "Price ? ";
    $price = rtrim(fgets(STDIN));
    $item = new ElectronicItem($selected,$price);
   
    $extras = $item->maxExtras();
    $unli = ($extras == -1) ? true : false;
    $msg = ($unli) ? "as many as you want" : $extras;
    $end = ($extras != 0) ? false : true;
    while(!$end){
        echo "select your extras [R] - remote controller [W] - wired controller ? ";
        $selected_extra = strtolower(rtrim(fgets(STDIN)));
        echo "How many ? (you can have $msg) ";
        $count = rtrim(fgets(STDIN));
        if($unli){
            echo "Do you want to add more extra [Y/N]? ";
            $end = strtolower(rtrim(fgets(STDIN)));
            $end = ($end == 'n') ? true : false;
            $extras = ($end) ? 0 : 4;
        }else{
            $extras = $extras - $count;
            $end = ($extras <= 0) ? true : false;
            $msg =  $extras;
        }
        
        $item->setExtras($count." ".$option_extra[$selected_extra]);
    }
    $items[] = $item;
    echo "Do you want to add more [Y/N]? ";
    $terminate = strtolower(rtrim(fgets(STDIN)));
    $terminate = ($terminate == 'n') ? true : false;
}
$items = new ElectronicItems($items);
print_r($items->getSortedItems());
print_r($items->getItemsByType('console'));

