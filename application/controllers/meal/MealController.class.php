<?php 
class MealController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $orderId=$queryFields['id'];
        
        $mealModel= new MealModel();
        $meals=$mealModel->getOne($orderId);
        $http->sendJsonResponse($meals);
    }
 public function httpPostMethod(Http $http, array $formFields)
 {
     
 }
}