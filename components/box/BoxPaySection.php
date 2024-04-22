<div class="BoxComponent">
    <div class="Counter">
        <div>$.</div>
        <div>00.0</div>
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
        <input id="montoRecibido" type="text" class="form-control input-lg" placeholder="Ingresa el importe pagado">
    </div>
    <div id="cuentaTotal" class="hidden">0</div>
    <button onclick="calcularVuelto()" type="button" class="btn btn-lg btn-primary btn-flat btn-block">
        Calcular Cambio
    </button>
    <div id="vueltoSpan"></div>
    <button type="button" class="btn btn-lg btn-primary btn-flat btn-block">
        Completar Venta
    </button>
</div>

<script>
    function calcularVuelto() {
        const cuentaTotal = parseFloat(document.getElementById("cuentaTotal").textContent);
        const montoRecibido = parseFloat(document.getElementById("montoRecibido").value);

        if (!isNaN(montoRecibido)) {
            if (montoRecibido >= cuentaTotal) {
                const vuelto = montoRecibido - cuentaTotal;
                document.getElementById("vueltoSpan").textContent = "El cambio es: " + vuelto.toFixed(2);
            } else {
                alert("El monto recibido debe ser igual o mayor que la cuenta total.");
            }
        } else {
            alert("Por favor, ingrese un monto recibido válido.");
        }
    }
</script>