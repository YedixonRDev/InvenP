<div class="box">
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
        </table>
    </div>
    <div class="box-footer">
        <p>Total de gastos: <span id="totalGastos"></span></p>
    </div>
</div>

<script>
    // Función para calcular y mostrar el total de los montos de gastos
    const calcularTotalGastos = () => {
        let total = 0;
        $('#tblGastos tbody tr').each(function() {
            // Obtener el monto de la fila actual y sumarlo al total
            let monto = parseFloat($(this).find('td:eq(2)').text()); // Suponiendo que la columna del monto es la tercera (0-indexed)
            total += monto;
        });
        // Mostrar el total en algún lugar de tu página
        $('#totalGastos').text(total.toFixed(2)); // Ajusta el número de decimales según sea necesario
    };

    // Llamar a la función para calcular el total de los gastos cuando la página esté lista
    $(document).ready(function() {
        calcularTotalGastos();
    });
</script>