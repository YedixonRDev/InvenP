<br>
<div class="block-header block-header--has-breadcrumb block-header--has-title">
    <div class="container">
        <div class="block-header__body">
            <h1 class="block-header__title">Carrito de Compras</h1>
        </div>
    </div>
</div>


<div class="block">
    <div class="container">
        <div class="cart">
            <div class="cart__table cart-table">
                <table class="cart-table__table">
                    <thead class="cart-table__head">
                        <tr class="cart-table__row">
                            <th class="cart-table__column cart-table__column--image">Imagen</th>
                            <th class="cart-table__column cart-table__column--product">Producto</th>
                            <th class="cart-table__column cart-table__column--price">Precio</th>
                            <th class="cart-table__column cart-table__column--quantity">Unidades</th>
                            <th class="cart-table__column cart-table__column--total">Total</th>
                            <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                    </thead>
                    <tbody class="cart-table__body" id="productsCart">

                      

                     


                       
                    </tbody>
                    <tfoot class="cart-table__foot">
                        <tr>
                            <td colspan="6">
                                <div class="cart-table__actions">
                                    <form class="cart-table__coupon-form form-row">
                                        <div class="form-group mb-0 col flex-grow-1">
                                            <input type="text" class="form-control form-control-sm" placeholder="Cupon de descuento">
                                        </div>
                                        <div class="form-group mb-0 col-auto">
                                            <button type="button" class="btn btn-sm btn-primary">Redimir Cupon</button>
                                        </div>
                                    </form>
                                    <div class="cart-table__update-button">
                                        <a class="btn btn-sm btn-primary" href="#">Actualizar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="cart__totals">
                <div class="card">
                    <div class="card-body card-body--padding--2">
                        <h3 class="card-title">Totales</h3>
                        <table class="cart__totals-table">
                            <thead>
                                <tr>
                                    <th>Subtotal</th>
                                    <td id="subTotal">$00.00</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Descuento</th>
                                    <td>$00.00</td>
                                </tr>
                                <tr>
                                    <th>Iva</th>
                                    <td>$00.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <td id="totalFinal">$00.00</td>
                                </tr>
                            </tfoot>
                        </table>
                        <a class="btn btn-primary btn-xl btn-block" href="#">Completar Pago</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-space block-space--layout--after-header"></div>