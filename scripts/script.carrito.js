$(document).ready(function() {
    document.title = "Carrito de Compras";
    getListCart();
    getEvents();
    scrollToTop();
    managerFormSearchProduct();
});


const  getListCart = () =>{
    let dataCart = appCart.getCart();
    let productsCart = dataCart.items;
    let items = dataCart.totalItems;
    let total = dataCart.totalValue;
    processListCart(productsCart,items,total);
}


const processListCart = (products,items,total) =>{
    $('#cartListProducts').html('');
    products.forEach(product => {
        $('#cartListProducts').append(`
            <tr class="cart-table__row">
                <td class="cart-table__column cart-table__column--image">
                    <div class="image image--type--product">
                        <a href="producto_detalle" class="image__body">
                            <img class="image__tag" src="assets/images/products/producto.jpg" alt="">
                        </a>
                    </div>
                </td>
                <td class="cart-table__column cart-table__column--product">
                    <a href="#" class="cart-table__product-name">${product.product}</a>
                </td>
                <td class="cart-table__column cart-table__column--price" data-title="precio">${monedaCop(product.price)}</td>
                <td class="cart-table__column cart-table__column--quantity" data-title="unidades">
                    <div class="cart-table__quantity input-number">
                        <input type="hidden" value="${product.code}" >
                        <input class="form-control input-number__input" type="number" min="1" value="${product.units}">
                        <div class="input-number__add  btn_add"></div>
                        <div class="input-number__sub  btn_sub"></div>
                    </div>
                </td>
                <td class="cart-table__column cart-table__column--total" data-title="Total">${monedaCop(product.totalValue)}</td>
                <td class="cart-table__column cart-table__column--remove">
                    <button type="button" class="cart-table__remove btn btn-sm btn-icon btn-muted btn_remove">
                        <svg width="12" height="12">
                            <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                                c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                                C11.2,9.8,11.2,10.4,10.8,10.8z">
                            </path>
                        </svg>
                    </button>
                </td>
            </tr>
        `);
    });
    $("#cartItems").html("");
    $("#cartTotal").html("");
    $("#cartItems").html(items);
    $("#cartTotal").html(monedaCop(total));





}


const getEvents = () =>{
    $('#cartListProducts').on('click', '.btn_add, .btn_sub, .btn_remove', function() {
        const productRow = $(this).closest('.cart-table__row');
        const productCode = productRow.find('input[type="hidden"]').val();
        const currentUnits = parseInt(productRow.find('.form-control').val());
        const action = $(this).hasClass('btn_add') ? 'btn_add' : ($(this).hasClass('btn_sub') ? 'btn_sub' : 'btn_remove');
        const dataObject = {
            action: action,
            unit: currentUnits,
            code: productCode
        };
        validateEvent(dataObject); 
    });
}

const validateEvent = (data) =>{
    switch (data.action) {
        case "btn_add":
            addProduct(data);
            break;
    
        case "btn_sub":
            subProduct(data);
            break;

        case "btn_remove":
            removeProduct(data);
            break;
    }
    
}

const addProduct = (data) =>{
    let code = data.code;
    let unit = parseInt(data.unit+1)
    appCart.updateProductQuantity(code, unit);
    getListCart();
}

const subProduct = (data) =>{
    let code = data.code;
    let unit = parseInt(data.unit-1)
    appCart.updateProductQuantity(code, unit);
    getListCart();
}

const removeProduct = (data) =>{
    let code = data.code;
    appCart.removeProduct(code);
    getListCart();
}



/*
       
*/