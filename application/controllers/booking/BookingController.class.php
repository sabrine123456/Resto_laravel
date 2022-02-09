<?php
class BookingController
 {
 
 
 public function httpGetMethod(Http $http, array $queryFields)
    {
            $userSession=new UserSession();
            if($userSession->isAuthenticated() == false)
            {
               $http->redirectTo('/user/login');
            }
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    
      
        	$couvert=$formFields['couvert'];
            $hour=$formFields['hour'];
            $minute=$formFields['minutes'];
            
            $time=$hour.':'.$minute;
            
            $year=$formFields['year'];
            $month = $formFields['month'];
            $day=$formFields['day'];
            
            $date=$year.'-'.$month.'-'.$day;
           
            $reservation=new BookingModel();
           
            $ajout=$reservation->addReservation($couvert,$time,$date,$_SESSION['user']['Id']);
            $http->redirectTo('/');
        
       
    }
 }