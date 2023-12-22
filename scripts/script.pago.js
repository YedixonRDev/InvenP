$(document).ready(function() {
    document.title = "Pago";

    managerCheckbox(["cartPayCheckboxPse","cartPayCheckboxVisa","cartPayCheckboxAddi"]);
    getListCart(); 
    validateSession();
    loadBodyComplete();
    scrollToTop();
 });

let dataSession = false;

const validateSession = () => {
    const sessionStatus = appSession.status();
    if (sessionStatus) {
        console.log(sessionStatus);
        console.log("true");
    } else {
        //$("#sectionCartPayLogin").slideDown(0);
        //$("#sectionCartPayClient").slideDown(0);
    }
    
}

const  getListCart = () =>{
    let dataCart = appCart.getCart();
    let productsCart = dataCart.items;
    let items = dataCart.totalItems;
    let total = dataCart.totalValue;
    processListCart(productsCart,items,total);
}

const processListCart = (products,items,total) =>{
    $('#cartPayTableProducts').html('');
    products.forEach(product => {
        $('#cartPayTableProducts').append(`
            <tr>
                <td class="payCampProd">${product.product}</td>
                <td class="payCampUnits" > <div class="paySeparatorX"> x </div>${product.units}</td>
                <td>${monedaCop(product.price)}</td>
            </tr>
        `);
    });
    $("#cartPaySubTotal").html("");
    $("#cartPayTotal").html("");
    $("#cartPaySubTotal").html(monedaCop(total));
    $("#cartPayTotal").html(monedaCop(total));
    
}


const  managerCheckbox = (arrayId) =>{
    arrayId.forEach(function(id) {
        const checkbox = document.getElementById(id);
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                arrayId.filter(item => item !== id).forEach(function(otroID) {
                    document.getElementById(otroID).checked = false;
                });
            }
        });
    });
}

const  managerCheckboxGetValue = (arrayId) =>{
    for (let i = 0; i < arrayId.length; i++) {
        const checkbox = document.getElementById(arrayId[i]);
        if (checkbox.checked) {
            return checkbox.value;
        }
    }
    return null;
}

const selectSectionCartPay = (value) =>{
    $(".sectionCartPay").slideUp(0);
    switch (value) {
        case 1:
            $("#sectionCartPayClient").slideDown(0);
            break;
        case 2:
            $("#sectionCartPayDirection").slideDown(0);
            break;
        case 3:
            $("#sectionCartPayMotorbike").slideDown(0);
            break;
    }
}

//managerCheckboxGetValue(["cartPayCheckboxPse","cartPayCheckboxVisa","cartPayCheckboxAddi"]);


