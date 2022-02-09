<?php
class UserController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
         $user = new UserForm();
        
         
       
         return 
         ['_form'=>$user,
         'flashBag' => new FlashBag()
          
         ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $nom=$formFields['nom'];
        $prenom=$formFields['prenom'];
        $adress=$formFields['adresse'];
        $ville=$formFields['ville'];
        $code=$formFields['code'];
        $pay=$formFields['pays'];
        $tel=$formFields['tel'];
        $mail=$formFields['mail'];
        $pass=$formFields['mdp'];
        $year=$formFields['year'];
        $month = $formFields['month'];
        $day=$formFields['day'];
        $date=$year.'-'.$month.'-'.$day;
         
    	$inscription = new UserModel();
         $cree = $inscription->addUser($nom,$prenom,$adress,$ville,$code,$pay,$tel,$mail,$pass,$date);
         
        
    }

}