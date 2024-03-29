<div class="product">
    <div class="tableProduct">
        <div> 
            <?php 
                require 'components/products/TableProduct.php';
                $NewTableProduct->Render();
            ?>
        </div>
    </div>
    <div class="formProduct">
        <div> 
            <?php 
                require 'components/products/FormProduct.php';
                $NewFormProduct->Render();
            ?>
        </div>
    </div>   
</div>