<?php
class MealController
 {
 
 
 public function httpGetMethod(Http $http, array $queryFields)
    {
       
           
         
         $meal = new MealModel();
    	      $meals = $meal->getListMeal();
    	      
    	      
    	      return
            	[
    		     'meals' => $meals,
    		     
            	];
            	
            	
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $name =$formFields['Name'];
        $desc =$formFields['Description'];
        $photo =$formFields['Photo'];
        $quant =$formFields['QuantityInStock'];
        $buy =$formFields['BuyPrice'];
        $sale =$formFields['SalePrice'];
        
        
        $ajout=new MealModel();
        $ajouter = $ajout->getMeal($name,$desc,$photo,$quant,$buy,$sale);
        $http->redirectTo('/');
        
        
    }

 }