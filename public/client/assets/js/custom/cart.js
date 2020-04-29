const isValidStep = (activePanelNum,eventTarget,DOMstrings) =>{
    //alert(activePanelNum+" data ");
    if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) 
    {
        activePanelNum--;
        setActiveStep(activePanelNum);
        setActivePanel(activePanelNum);
    }
    else if(activePanelNum == '0')
    { //is cart exist...
        isCartExist(function(data){
            if(data.total <= 0)
            {
                alert("Cart is empty..");   
            }   
            else{
                isActiveNextStep(activePanelNum,eventTarget,DOMstrings);
            }
        });
    }
    else if(activePanelNum == '1')
        {
            let name=$("#firstname").val();
            let lastname=$("#lastname").val();
            let address=$("#txt_cart_address").val();
            let email=$("#email").val();
            let phonenumber=$("#phonenumber").val();
            let postcode=$("#postcode").val();
            
            
            if(name == '')
                alert("Name is required");
            else if(address == '')
                alert("Address is required...");
            else if(lastname == '')
                alert("last name is required...");
            else if(email == '')
                alert("email is required...");
            else if(postcode == '')
                alert("post code is required...");
            else{
                isActiveNextStep(activePanelNum,eventTarget,DOMstrings);
   
            }
        }
    else if(activePanelNum == '2')
        {
           var payment_type= $(".div_payment_radio input[type='radio']:checked").val();
            isActiveNextStep(activePanelNum,eventTarget,DOMstrings);
            
        }
}

function isCartExist(callback){
    const method="GET";
    const url="./isCartExist";
    const data={};
    ajaxSetup(function(data)
    {
        callback(data);
            
    },method,url,data);
}

// function orderCheckout(v){
//     let name=$("#firstname").val();
//     let address=$("#txt_cart_address").val();

//     isCartExist(function(data){
//         if(data.total <= 0)
//         {
//             alert("Cart is empty..");   
//         }   
//         else{
//             // alert(name);
//         }
//     });
function orderCheckout(v){
    let name=$("#firstname").val();
    let address=$("#txt_cart_address").val();
    let email=$("#email").val();
    let lastname=$("#lastname").val();
    let phonenumber=$("#phonenumber").val();
    let postcode=$("#postcode").val();
    let status=$("#status").val();
    let credit=$("#credit").val();
    let debit=$("#debit").val();
    let paypal=$("#paypal").val();
    let bkash=$("#bkash").val();
    let cardname=$("#card-name").val();
    let cardno=$("#card-no").val();
    let expireDate=$("#expireDate").val();
    let security_number=$("#sec-no").val();
    let comment=$("#comment").val();

    isCartExist(function(data){
        if(data.total <= 0)
        {
            alert("Cart is empty..");   
        }   
        else{
            // alert(lastname);
            $.ajax({
				type: 'POST',
				//dataType: 'json',
				url: "./confim-order",
				data: {name: name, lastname:lastname,phonenumber:phonenumber,postcode:postcode,status:status,credit:credit,debit:debit,paypal:paypal,expireDate:expireDate,security_number:security_number,comment:comment,email:email,address:address,cardname:cardname,cardno:cardno},
				success: function (data) {
				alert("your order created successfully!!");
				}
			});
        }
    });


}


// ------------------------------------------
function increaseValue(v) {
    let id = $(v).attr("data-id");
    let value = parseInt(document.getElementById('qty-'+id).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('qty-'+id).value = value;
    let rowId=$("#rowId-"+id).val();
    let qty=$("#qty-"+id).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: './update-cart',
        type: 'POST',
        data: {increment: true,qty:qty,rowId:rowId},
        success: function() { alert('cart quantity is increased successfully!!') }
    });

  }



  
  function decreaseValue(v) {
    let id = $(v).attr("data-id");
    let value = parseInt(document.getElementById('qty-'+id).value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('qty-'+id).value = value;
    
    let rowId=$("#rowId-" +id).val();
    let qty=$("#qty-" +id).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: './update-cart',
        type: 'POST',
        data: {increment: true,qty:qty,rowId:rowId},
        success: function() { alert('cart quantity is decreased successfully!!') }
    });


  }

// ------------------------------------------


function addToCart(v){
    let id = $(v).attr("data-id");
    let proid=$("#proid-"+id).val();
    let qty=$("#qty-"+id).val();
    
    // alert(proid);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 
    $.ajax({
        type: 'POST',
        //dataType: 'json',
        url: "./add-to-cart",
        data: {id:id,proid:proid,qty:qty},
        success: function (data) {
        alert("cart added successfully!!");
        }
    });
}


// function updateCart(v){
   
//     let rowId=$("#rowId").val();
//     let qty=$("#qty").val();
   
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     // alert(rowId);
//     $.ajax({
//         type: 'POST',
//         //dataType: 'json',
//         url: "./update-cart",
//         data: {rowId:rowId,qty:qty},
//         success: function (data) {
//         alert("cart updated successfully!!");
//         }
//     });
        
// }

const isActiveNextStep=(activePanelNum,eventTarget,DOMstrings)=>{
    if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
        activePanelNum--;
    } else {
        activePanelNum++;
    }
    setActiveStep(activePanelNum);
    setActivePanel(activePanelNum);
}