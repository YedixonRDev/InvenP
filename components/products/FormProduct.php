<?php
    class FormProduct{

        private $num;
        private $onClick;

        public function Render(){
            echo 
            '<div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar Productos</h3>
            </div>
            <div class="box-body">
                <input class="form-control input-md" type="text" placeholder="Nombre">
                    <br>
                <select class="form-control input-md">
                    <option value="">Selecciona una categoria</option>
                    <option value="">Pollo Broaster</option>
                    <option value="">Pollo Asado</option>
                    <option value="">Fritos</option>
                    <option value="">Combos</option>
                    <option value="">Bebidas</option>
                    <option value="">Panes</option>
                </select>
                    <br>
                <input class="form-control input-md" type="text" placeholder="Precio">
                <div class="row">
                    <div class="col-md-6">
                    <button class="btnRegister btn-block btn-success">Registrar</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btnCancel btn-block btn-danger">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        </div>';
        }
    }
$NewFormProduct = new FormProduct;
?>