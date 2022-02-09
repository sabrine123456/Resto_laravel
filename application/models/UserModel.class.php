<?php 
class UserModel {
    
      private function hashPassword($pass)
        {
            $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);
            return crypt($pass, $salt);
        }
        
        
    public function addUser($nom,$prenom,$adress,$ville,$code,$pay,$tel,$mail,$pass,$date)
    {
        $base = new Database();
        $sql='INSERT INTO `user` ( `FirstName`, `LastName`, `Email`, `Password`, `BirthDate`, `Address`, `City`, `ZipCode`, `Country`, `Phone`, `CreationTimestamp`)  VALUES (?,?,?,?,?,?,?,?,?,?,NOW())';
         $user= $base->executeSql($sql,[$nom,$prenom,$mail,$pass,$date,$adress,$ville,$code,$pay,$tel]);
         
       
	   
    }
    
    function getEmail($email,$pass)
    {
        
        $bd = new Database();
         // On vérifie qu'il y a un utilisateur avec l'adresse e-mail spécifiée.
        $user = $bd->queryOne("SELECT Id FROM user WHERE Email = ?", [ $email ]);
       if ($user==false)
       {
           throw new DomainException
                (
                    "Il existe déjà un compte utilisateur avec cette adresse e-mail"
                );
       }
      
     $flashBag = new FlashBag();
    $flashBag->add('Votre compte utilisateur a bien été créé.');
    }
    
    
    public function findWithEmailPassword($email, $pass)
        {
            $database = new Database();

            // Récupération de l'utilisateur ayant l'email spécifié en argument.
            $user = $database->queryOne
            (
                "SELECT
                    Id,
                    LastName,
                    FirstName,
                    Email,
                    Password,
                    Admin
                FROM user
                WHERE Email = ?",
                [ $email ]
            );

            // Est-ce qu'on a bien trouvé un utilisateur ?
            if($user == false)
            {
                throw new DomainException
                (
                    "Il n'y a pas de compte utilisateur associé à cette adresse email"
                );
            }
            //  if($this->verifyPassword($pass, $user['Password']) == false)
            // {
            //     throw new DomainException
            //     (
            //         'Le mot de passe spécifié est incorrect'
            //     );
            // }

            return $user;
        }
     private function verifyPassword($password, $hashedPassword)
        {
            // Si le mot de passe en clair est le même que la version hachée alors renvoie true.
            return crypt($password, $hashedPassword) == $hashedPassword;
        }
        
       


}