<?php
class LoginController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
         $login = new LoginForm();
         
         return ['_form'=>$login];
         
        
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        try{
            $email =$formFields['email'];
        $pass = $formFields['mdep'];
        
        $userModel = new UserModel();
        
        $user1=$userModel->findWithEmailPassword($email,$pass);
        
        $userSession = new UserSession();
                $userSession->create
                (
                    $user1['Id'],
                    $user1['FirstName'],
                    $user1['LastName'],
                    $user1['Email'],
                    $user1['Admin']
                );
        $http->redirectTo('/');
        }
        catch(DomainException $exception)
            {
                // Réaffichage du formulaire avec un message d'erreur.
                $form = new UserForm();
                $form->bind($formFields);
                $form->setErrorMessage($exception->getMessage());

                return [ '_form' => $form ];
            }
        
        
    }
}