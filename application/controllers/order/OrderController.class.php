<?php

class OrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        
        $userSession = new UserSession();
        if ($userSession->isAuthenticated() == false)
        {
            // On ne peut pas commander sans être connecté
            $http->redirectTo('/user/login');
        }
        
        
              $meal = new HomeModel();
    	      $meals = $meal->getListAll();
    	      
    	      
    	      return
            	[
    		     'meals' => $meals,
    		     
            	];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    }
}