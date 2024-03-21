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
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label>Buscar movimiento:<input type="search" class="form-control input-xm" placeholder="" aria-controls="example1"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 313.4px;">Tipos de movimientos</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 381.4px;">Descripcion</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 339.4px;">Monto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Gastos</td>
                                            <td>Harina</td>
                                            <td>120.000$</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">Prestamos</td>
                                            <td>Prestamos Yedixon</td>
                                            <td>50.000$</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous disabled" id="example1_previous">
                                            <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
                                        </li>
                                        <li class="paginate_button active">
                                            <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a>
                                        </li>
                                        <li class="paginate_button next" id="example1_next">
                                            <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }

    $NewTableGastos = new TableGastos;
?>
