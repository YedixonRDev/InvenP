<div class="BoxComponent">
    <div class="Counter">
        <div>$.</div>
        <div>1.000.000</div>
    </div>
    <div class="Btns ">
        <button type="button" class="btn btnActions  btn-default btn-lg">
            <i class="fa-solid fa-trash"></i>
            <div>Limpiar</div>
        </button>
        <button type="button" onClick="showModalBox()" class="btn btnActions  btn-default btn-lg  ">
            <div>Agregar</div>
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
    <div class="SelectPay">
        <div class="form-group">
            <label>Elija Medio de Pago</label>
            <select class="form-control input-lg">
                <option></option>
                <option>Efectivo</option>
                <option>Transferencia</option>
            </select>
        </div>
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-dollar"></i>
        </span>
        <input type="text" class="form-control input-lg" placeholder="Ingresa el importe">
    </div>
    <button type="button" class="btn btn-lg btn-primary btn-flat btn-block">
        Completar Venta
    </button>
</div>