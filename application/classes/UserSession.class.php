<?php

    class UserSession
    {
        public function __construct()
        {
            if (session_status() == PHP_SESSION_NONE)
            {
                // Démarrage du module PHP de gestion des sessions.
                session_start();
            }
        }

        public function create($userId, $firstName, $lastName, $email, $admin)
        {
            // Construction de la session utilisateur.
            $_SESSION['user'] =
            [
                'Id'        => $userId,
                'FirstName' => $firstName,
                'LastName'  => $lastName,
                'Email'     => $email,
                'Admin'     => $admin
            ];
        }

        public function isAuthenticated()
        {
            if(array_key_exists('user', $_SESSION) == true)
            {
                
                if (empty($_SESSION['user']) == false) {
                    return true;
                }
            }
            return false;
        }

        public function getFullName()
        {
            if($this->isAuthenticated() == false)
            {
                return null;
            }
            return $_SESSION['user']['FirstName'].' '.$_SESSION['user']['LastName'];
        }
        
        public function deconnexion ()
        {
            
            $_SESSION=[];
            
            session_destroy();
        }
        
        public function getAdmin()
        {
            if($this->isAuthenticated() == false)
            {
                return null;
            }
            return $_SESSION['user']['Admin'];
        
        }
           public function getId()
        {
            if($this->isAuthenticated() == false)
            {
                return null;
            }
            return $_SESSION['user']['Id'];
        
        }
    }