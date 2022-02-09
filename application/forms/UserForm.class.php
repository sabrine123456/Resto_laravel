<?php  
class UserForm extends Form
{
    public function build()
    {
         $this->addFormField('nom');
         $this->addFormField('prenom');
         $this->addFormField('adresse');
         $this->addFormField('ville');
         $this->addFormField('code');
         $this->addFormField('pays');
         $this->addFormField('tel');
         $this->addFormField('mail');
         
         
    }
   
    
}