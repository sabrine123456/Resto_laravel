<?php

class BookingModel
{
          function addReservation($couvert,$time,$date,$id)
        {
            
             $data = new Database();
            $sql="INSERT INTO `booking`(`BookingDate`, `BookingTime`, `NumberOfSeats`, `User_Id`, `CreationTimestamp`) VALUES 
            (?,?,?,?,NOW())";
            $add=$data->executeSql($sql,[$date,$time,$couvert,$id]);
            
            
            $flashBag = new FlashBag();
            $flashBag->add('votre commande à été reservé');
        }
        
       
}