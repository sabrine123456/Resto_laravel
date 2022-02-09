<?php 
class LogoutController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
         $userSession = new UserSession();
        $userDec=$userSession->deconnexion();
        $http->redirectTo('/');
        
    }
     public function httpPostMethod(Http $http, array $formFields)
    {
       
    }
}