<?php
class BoxTable {
    private $num;
    private $onClick;

    public function Render($Nun, $Function) {
        $this->num = $Nun;
        $this->onClick = $Function;

        echo '<div class="Table" onclick="' . $this->onClick . '">
                <img src="./assets/imgs/table.png" alt="mesa1">
                Mesa ' . $this->num . '
            </div>';
    }
}

$NewBoxTable= new BoxTable();

?>