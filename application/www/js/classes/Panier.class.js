class Panier
{
    constructor()
    {
        this.items=[];
        this.load();
    }
    add(mealId,quantity,name,salePrice,totalPrice)
    {
        for(let i=0; i<this.items.length ; i++)
        {
            if (this.items[i].mealId==mealId)
            {
                this.items[i].quantity+=quantity;
               
                this.items[i].totalPrice+=totalPrice;
                this.save();
                return;
            }
        }
        this.items.push({
            mealId:parseInt(mealId),
            quantity:quantity,
            name :name,
            salePrice: salePrice,
            totalPrice:totalPrice
        });
        
        this.save();
    }
    save()
    {
        saveDataToDomStorage('panier',this.items);
    }
    
    delete(id){
        this.load();
        this.items.splice(id,1);
        this.save();
    }
    
    load()
    {
        this.items=loadDataFromDomStorage('panier');
        if(this.items == null)
        {
            this.items =new Array();
        }
    }
    getItems()
    {
        return this.items;
    }
    isEmpty()
    {
        
    }
    
}