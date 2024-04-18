// Importar la función a probar
import $ from 'jquery.mock';
const { onSubmitFrmInsertGastos } = require('./script.gastos.js');

// Mockear la librería jQuery para las pruebas
jest.mock('jquery');

describe('Pruebas para la función onSubmitFrmInsertGastos', () => {
  test('Debería enviar datos al servidor cuando se envía el formulario', () => {
    // Configuración de los datos del formulario
    document.body.innerHTML = `
      <form id="frmInsertGastos">
        <input id="frmInsertGastosName" value="Nombre">
        <input id="frmInsertGastosDescription" value="Descripción">
        <input id="frmInsertGastosMonto" value="123">
        <input id="frmInsertGastosFecha" value="2024-04-14">
      </form>
    `;

    // Configurar la respuesta simulada del servidor
    $.ajax.mockImplementationOnce(() => {
      return Promise.resolve({
        status: true
      });
    });

    // Llamar a la función a probar
    onSubmitFrmInsertGastos();

    // Simular el envío del formulario
    $('#frmInsertGastos').submit();

    // Verificar que los datos se enviaron al servidor
    expect($.ajax).toHaveBeenCalledWith({
      type: 'POST',
      url: 'api/data/gastos.php', 
      data: JSON.stringify({
        nombre: 'Nombre', 
        descripcion: 'Descripción',
        monto: '123',
        fecha: '2024-04-14'
      }),
      contentType: 'application/json',
      dataType: 'json'
    });
  });
});
