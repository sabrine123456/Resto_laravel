<?php

class OrderModel
{
 public function getInfo()
 {
    $base=new Database();
    $sql='SELECT * FROM `order`';
    $info= $base->query($sql);
 
    return $info;
     
 }
  public function createOrder($UserId,array $val)
 {
    $base=new Database();
     $orderId = $base->executeSql(
           'INSERT INTO `order`(`User_Id`, `CreationTimestamp`, `TaxRate`)
           VALUES (?,NOW(),(20.0))',[$UserId]
           );
 
    $sql = 'INSERT INTO `orderline`(`QuantityOrdered`, `Meal_Id`, `Order_Id`, `PriceEach`)
                VALUES (?, ?, ?, ?)';
        // Initialisation du montant total HT.
        $totalAmount = 0;
        // Insertion des lignes de la commande
        foreach($val as $basketItem)
        {
            // Ajout du montant HT de la ligne du panier au montant total HT
            $totalAmount += $basketItem['quantity'] * $basketItem['salePrice'];
            // Insertion d'une ligne de commande dans la base de données
            $database->executeSql
            (
                $sql,
                [
                    $orderId,
                    $basketItem['mealId'],
                    $basketItem['quantity'],
                    $basketItem['salePrice']
                ]
            );
        };
        // Mise à jour de la commande dans la base de donnée, avec les montants
        $sql = 'UPDATE `order`
                SET CompleteTimeStamp   = NOW(),
                    TotalAmount         = ?,
                    TaxAmount           = ? * TaxRate / 100
                WHERE Id = ?';
        $database->executeSql
        (
            $sql,
            [
                $totalAmount,
                $totalAmount,
                $orderId
            ]
        );
        return $orderId;
    }
 
 
    
}