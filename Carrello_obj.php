<?php

require_once  $homedir.'/pizzeria/CarrelloItem_obj.php';
// 'cart item' object
class Carrello{
 
    // database connection and table name
    private $conn;

    public $items;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
        $this->items=array();
    }
    public function add($product_id, $quantity, $tipo){
        $item=new CarrelloItem();
        $item->product_id = $product_id;
        $item->quantity = $quantity;
        $item->tipo = $tipo;
        array_push($this->items,$item);
    }
    public function delete($product_id, $tipo){
        $array=$this->items;
        foreach($array as $elementKey => $element) {
            foreach($element as $valueKey => $value) {
                if($valueKey == 'product_id' && $value == $product_id){
                    //delete this particular object from the $array
                    array_splice($array,$elementKey,1);
                } 
            }
        }
        $this->items=$array;
    }
}