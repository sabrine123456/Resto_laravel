<?php

class MealModel{
    
    public function getListMeal()
    {
           $base = new Database();
        $sql='Select * from meal';
         $meal= $base->query($sql);
        return $meal;
        
    }
    
    public function getMeal($name,$desc,$photo,$quant,$buy,$sale)
    {
        $data = new Database();
            $sql="INSERT INTO `meal`(`Name`, `Photo`, `Description`, `QuantityInStock`, `BuyPrice`, `SalePrice`) 
            VALUES (?,?,?,?,?,?)";
            $add=$data->executeSql($sql,[$name,$photo,$desc,$quant,$buy,$sale]);
    }
    public function getOne($orderId)
    {
            $base = new Database();
        $sql='SELECT * FROM meal WHERE Id= ?';
          return $base->queryOne($sql,[$orderId]);
       
        
    }
    
}