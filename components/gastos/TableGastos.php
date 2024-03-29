<?php
    class TableGastos{
        private $num;
        private $onClick;

        public function Render(){
            echo 
            '<div class="box">
                <div class="box-header">
                    <h3 class="box-title">Movimientos Actuales</h3>
                </div>
                <div class="box-body">
                    <table id="tblGastos" class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>';
        }

    }

    $NewTableGastos = new TableGastos;
?>
