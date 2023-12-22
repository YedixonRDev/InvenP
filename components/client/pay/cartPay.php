<div class="site__body">
    <br><br>
    <div class="checkout block">
        <div class="container container--max--xl">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="card mb-lg-0">
                        <?php require 'components/client/pay/cartData.php';            ?>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                    <div class="card mb-0">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Datos Venta</h3>
                            <table class="checkout__totals">
                                <thead class="checkout__totals-header">
                                    <tr>
                                        <th>Producto</th>
                                        <th></th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="cartPayTableProducts" class="checkout__totals-products"></tbody>
                                <tbody class="checkout__totals-subtotals">
                                    <tr>
                                        <th>Subtotal</th>
                                        <td></td>
                                        <td id="cartPaySubTotal" >0</td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__totals-footer">
                                    <tr>
                                        <th>Total</th>
                                        <td></td>
                                        <td id="cartPayTotal" >0</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="checkout__payment-methods payment-methods">
                                <ul class="payment-methods__list">
                                   
                                    <li class="payment-methods__item itemPayMethod ">
                                        <div class="left">
                                            <input type="checkbox" id="cartPayCheckboxPse" value="pse" class="cartPayCheckbox" >
                                            <label for="cartPayCheckboxPse" class="cartPayLabel"></label>
                                        </div>
                                        <div class="middle">PAGAR CON PSE</div>
                                        <div class="right">
                                            <img src="assets/imgs/pay/pse.png" >
                                        </div>
                                    </li>

                                    <li class="payment-methods__item itemPayMethod ">
                                        <div class="left">
                                            <input type="checkbox" id="cartPayCheckboxVisa" value="visa" class="cartPayCheckbox" >
                                            <label for="cartPayCheckboxVisa" class="cartPayLabel"></label>
                                        </div>
                                        <div class="middle">DÉBITO O CRÉDITO</div>
                                        <div class="right">
                                            <img src="assets/imgs/pay/visa.png" >
                                        </div>
                                    </li>

                                    <li class="payment-methods__item itemPayMethod ">
                                        <div class="left">
                                            <input type="checkbox" id="cartPayCheckboxAddi" value="addi" class="cartPayCheckbox" >
                                            <label for="cartPayCheckboxAddi" class="cartPayLabel"></label>
                                        </div>
                                        <div class="middle">CRÉDITO ADDI</div>
                                        <div class="right">
                                            <img src="assets/imgs/pay/addi.png" >
                                        </div>
                                    </li>

                                </ul>
                            </div>
                           
                            <button type="submit" class="btn btn-primary btn-xl btn-block">
                                REALIZAR PAGO
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="block-space block-space--layout--before-footer"></div>

</div>