<div class="gastos">
    <div class="tableNewGastos">
    <div> 
            <?php 
                require 'components/gastos/TableGastos.php';
                $NewTableGastos->Render();
            ?>
        </div>
    </div>
    <div class="formNewGastos">
        <div> 
            <?php 
                require 'components/gastos/FormGastos.php';
                $NewFormGastos->Render();
            ?>
        </div>
    </div>
</div>

