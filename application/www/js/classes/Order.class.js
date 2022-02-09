class Order
{
    
    constructor()
    {
        this.$meal = $('#select');
        this.Data=[];
        this.$mealDetails=$('#meal-details');
        this.$validator=('#validator');
        this.basket = new Panier();
    }
onChangeOrder(event)
{
   var orderId=event.currentTarget.value;
    
    $.get(
        getRequestUrl()+'/meal?id='+orderId,
        function(data)
        {   this.Data=data;
           
            $('#photo').attr('src',getWwwUrl()+"/images/meals/"+data['Photo']);
            
            $('#description').text(data['Description']);
            $('#prix').text(data['SalePrice']);
        }, 'json'
        )
}

run()
{
    this.$meal.on('change',this.onChangeOrder.bind(this));

    this.$meal.trigger('change');
    $('#ajout').on('click',this.onClickAjout.bind(this));
    $(document).on('click','.delete',this.onClickDelete.bind(this));
    this.refreshBasket();
    
}
onClickAjout(event)
{  event.preventDefault();
let mealId=this.$meal.val();
    let quantity= parseInt($('#quantité').val());
    let name=$('option:selected').text();
    let salePrice= parseFloat(this.$mealDetails.find('strong').text());
    let totalPrice= parseFloat((salePrice*quantity).toFixed(2));
   
  this.basket.add(mealId,quantity,name,salePrice,totalPrice);
  this.refreshBasket()
    
}


/*********************** supprimer***************/



onClickDelete(event){
     event.preventDefault();
     var id=event.currentTarget.getAttribute('href');
     this.basket.delete(id);
     this.refreshBasket();
}



refreshBasket()
{   
    this.basket.load();
    
    var panier={Panier:this.basket.items};
  
    $.post(
        getRequestUrl()+'/basket',
        panier,
        this.onAjaxRefreshOrderSummary.bind(this)
        
        
        );
}

ValidatorBasket()
{   
  
    var validation={val:this.basket.items};
  
    $.post(
        getRequestUrl()+'/order/validation',
        $formFields,
        this.onAjaxValidation.bind(this)
        
        
        );
}
onAjaxValidation()
{
    
}


onAjaxRefreshOrderSummary(dataHtml)
        {
            $('#order-summary').html(dataHtml);
            
            if((this.basket.isEmpty()) == true)
            {
                this.$validator.attr('disabled',true);
            }
            else
            {
                this.$validator.attr('disabled',false);
            }
            
        }

}