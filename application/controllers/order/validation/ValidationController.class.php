<?php

class ValidationController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
          
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $orderModel= new OrderModel();
        $orderModel->createOrder($UserId,$val);
        $http->sendJsonResponse($orderId);
        
        $val=$formFields['val'];
        $session= new UserSession();
        $UserId= $session->getId();
       
        $order= new Order();
        $order->ValidatorBasket();
        
    }
}