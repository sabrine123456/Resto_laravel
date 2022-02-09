<?php 
class HomeModel {
    public function getListAll()
    {
        $base = new Database();
        $sql='Select * from meal';
         $image= $base->query($sql);
        return $image;
         
    }
}