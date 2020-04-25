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
            let address=$("#txt_cart_address").val();

            if(name == '')
                alert("Name is required");
            else if(address == '')
                alert("Address is required...");
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


function updateCart(v){
   
    let rowId=$("#rowId").val();
    let qty=$("#qty").val();
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // alert(rowId);
    $.ajax({
        type: 'POST',
        //dataType: 'json',
        url: "./update-cart",
        data: {rowId:rowId,qty:qty},
        success: function (data) {
        alert("cart updated successfully!!");
        }
    });
        
    


}

const isActiveNextStep=(activePanelNum,eventTarget,DOMstrings)=>{
    if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
        activePanelNum--;
    } else {
        activePanelNum++;
    }
    setActiveStep(activePanelNum);
    setActivePanel(activePanelNum);
}