'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////

function runFormValidation()
{
    var $form;
    var formValidator;
    $form = $('form:not([data-no-validation=true])');
    // Y a t'il un formulaire à valider sur la page actuelle ?
    if($form.length == 1)
    {
        // Oui, exécution de la validation de formulaire.
        formValidator = new FormValidator($form);
        formValidator.run();
    }
}

function runFormOrder()
{
var meal = new Order();
meal.run();
}
    /////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////
$(function()
{
    $('#notice').delay(3000).fadeOut('slow');
    
    runFormOrder();
    runFormValidation();
    
    })
