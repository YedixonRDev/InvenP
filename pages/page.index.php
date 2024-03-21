<div class="component">
    <div> 
        <?php 
            require 'components/indexBoxTable.php';
            $NewBoxTable->Render(1, ''); 
            for ($i = 2; $i <= 4; $i++) {
                $NewBoxTable->Render($i, 'miFuncionOnClick(' . $i . ');');
            }
        ?>
    </div>
</div>
