<?php

class AdminModel
{
 public function getInfo()
 {
    $base=new Database();
    $sql='SELECT * FROM `order`';
    $info= $base->query($sql);
 
    return $info;
     
 }
  
    
}