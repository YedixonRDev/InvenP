<?php
    class TableProduct{

        private $num;
        private $onClick;

        public function Render(){
        echo 
        '<div class="box">
            <div class="box-header">
                <h3 class="box-title">Productos Disponibles</h3>
            </div>
            <div class="box-body">
                <table id="tblProducts" class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>';
            }
    }
$NewTableProduct = new TableProduct;
?>

