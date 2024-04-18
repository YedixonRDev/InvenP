<form id="frmInsertProduct" class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Registrar Productos</h3>
    </div>
    <div class="box-body">
        <input id="frmInsertProductName" class="form-control input-md" type="text" placeholder="Nombre">
        <br>
        <select id="frmInsertProductCategory" class="form-control input-md">
            <option value="">Selecciona una categoria</option>
            <option value="Pollo Broaster">Pollo Broaster</option>
            <option value="Pollo Asado">Pollo Asado</option>
            <option value="Fritos">Fritos</option>
            <option value="Combos">Combos</option>
            <option value="Bebidas">Bebidas</option>
            <option value="Panes">Panes</option>
        </select>
        <br>
        <input id="frmInsertProductPrice" class="form-control input-md" type="text" placeholder="Precio">
        <div class="row">
            <div class="col-md-6">
                <button class="btnRegister btn-block btn-success">Registrar</button>
            </div>
            <div class="col-md-6">
                <div onClick="frmInsertProductsClean()" class="btnCancel btn-block btn-danger">Cancelar</div>
            </div>
        </div>
    </div>
</form>