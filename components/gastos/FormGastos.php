<?php
    class FormGastos{

        private $num;
        private $onClick;

        public function Render(){
            echo 
            '<div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar Movimientos</h3>
            </div>
            <div class="box-body">
                <label for="text">Tipo de movimiento</label><select class="form-control input-md" type="text" placeholder="Tipo de Movimiento">
                    <option value="">Selecciona el movimiento</option>
                    <option value="">Gastos</option>
                    <option value="">Prestamos</option>
                </select>
                <div class="form-group">
                      <label>Descripcion</label>
                      <textarea class="form-control" rows="3" placeholder="Describe el movimiento"></textarea>
                    </div>
                <label for="text">Monto</label><input class="form-control input-md" type="text" placeholder="$">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btnRegister btn-block btn-success">Registrar Movimiento</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btnCancel btn-block btn-danger">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>';
        }
    }
$NewFormGastos = new FormGastos;
?>