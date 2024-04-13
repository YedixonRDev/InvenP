<form id="frmInsertGastos" class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Registrar Movimientos</h3>
    </div>
    <div class="box-body">
        <label for="text">Tipo de movimiento</label>
        <select id="frmInsertGastosName" class="form-control input-md" type="text" placeholder="Tipo de Movimiento">
            <option value="">Selecciona el movimiento</option>
            <option value="Gastos">Gastos</option>
            <option value="Prestamos">Prestamos</option>
        </select>
        <div class="form-group">
            <label>Descripcion</label>
            <textarea id="frmInsertGastosDescription" class="form-control" rows="3" placeholder="Describe el movimiento"></textarea>
        </div>
        <label for="text">Monto</label>
        <input id="frmInsertGastosMonto" class="form-control input-md" type="text" placeholder="$">

        <label for="date">Fecha</label>
        <input id="frmInsertGastosFecha" class="form-control input-md" type="date">

        <div class="row">
            <div class="col-md-6">
                <button class="btnRegister btn-block btn-success">Registrar Movimiento</button>
            </div>
            <div class="col-md-6">
                <button class="btnCancel btn-block btn-danger">Cancelar</button>
            </div>
        </div>
    </div>
</form>