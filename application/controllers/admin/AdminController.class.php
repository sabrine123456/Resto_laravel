<?php
class AdminController
 {
 
 
 public function httpGetMethod(Http $http, array $queryFields)
    {
       $information= new AdminModel();
       $info=$information->getInfo();
       return['info'=>$info];
           
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
      
        
        
    }

 }