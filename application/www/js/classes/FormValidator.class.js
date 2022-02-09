class FormValidator
{
    
    constructor($form) {
        this.$form            = $form;
        this.$errorMessage    = $form.find('.error-message');
        this.$totalErrorCount = $form.find('.total-error-count');
        // Tableau général de toutes les erreurs de validation trouvées.
        this.totalErrors = null;
    }
    
    
    
   checkRequiredFields() {
        var errors;
        // Création d'un petit tableau contenant les erreurs trouvées.
        errors = new Array();
        // Boucle de recherche de tous les champs de formulaires requis.
        this.$form.find('[data-required]').each(function()
        {
            var value;
            /*
            * La méthode jQuery each() change la valeur de la variable this :
            * elle représente tous les objets DOM sélectionnés.
            *
            * Pour notre cas elle représente donc tour à tour chaque champ de
            * formulaire trouvé avec la méthode jQuery find().
            */
            // Récupération de la valeur du champ du formulaire (sans les espaces).
            value = $(this).val().trim();
            // Est-ce que quelque chose a été saisi ?
            if(value.length == 0)
            {
                // Non, alors que le champ est requis, donc il y a une erreur.
                errors.push(
                {
                    fieldName : $(this).data('name'),
                    message   : 'est requis'
                });
            }
        });
        // Copie des erreurs trouvées dans le tableau général des erreurs.
        $.merge(this.totalErrors, errors);
      
    }
    
    checkTypeFields() {
        var errors;
        // Création d'un petit tableau contenant les erreurs trouvées.
        errors = new Array();
        // Boucle de recherche de tous les champs de formulaires requis.
        this.$form.find('[data-type]').each(function()
        {
            var value;
            /*
            * La méthode jQuery each() change la valeur de la variable this :
            * elle représente tous les objets DOM sélectionnés.
            *
            * Pour notre cas elle représente donc tour à tour chaque champ de
            * formulaire trouvé avec la méthode jQuery find().
            */
            // Récupération de la valeur du champ du formulaire (sans les espaces).
            valeur = $(this).val().trim();
            // Est-ce que quelque chose a été saisi ?
            if(isNaN(valeur))
            {
                // Non, alors que le champ est requis, donc il y a une erreur.
                errors.push(
                {
                    fieldName : $(this).data('name'),
                    message   : 'Not number'
                });
            }
        });
        // Copie des erreurs trouvées dans le tableau général des erreurs.
        $.merge(this.totalErrors, errors);
    }
    
     checkLangueurFields() {
        var errors;
        // Création d'un petit tableau contenant les erreurs trouvées.
        errors = new Array();
        // Boucle de recherche de tous les champs de formulaires requis.
        this.$form.find('[data-length]').each(function()
        {
            var value;
            /*
            * La méthode jQuery each() change la valeur de la variable this :
            * elle représente tous les objets DOM sélectionnés.
            *
            * Pour notre cas elle représente donc tour à tour chaque champ de
            * formulaire trouvé avec la méthode jQuery find().
            */
            // Récupération de la valeur du champ du formulaire (sans les espaces).
            valeur = $(this).val();
            // Est-ce que quelque chose a été saisi ?
            if(valeur.length < value.data('length'))
            {
                // Non, alors que le champ est requis, donc il y a une erreur.
                errors.push(
                {
                    fieldName : $(this).data('name'),
                    message   : 'tres court'
                });
            }
        });
        // Copie des erreurs trouvées dans le tableau général des erreurs.
        $.merge(this.totalErrors, errors);
    }
    
    gettotalError()
    {
        return this.totalErrors;
    }
}