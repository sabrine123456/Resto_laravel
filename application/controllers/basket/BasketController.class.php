<?php 
class BasketController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
       
    }
 public function httpPostMethod(Http $http, array $formFields)

 {
      if(empty($formFields['Panier'])){
     $basket=[];
      }
      else{
     $basket=$formFields['Panier'];
          
      }
     
     return ['_raw_template' => true ,
              'panier'=>$basket  
                 
     ];
 }
}