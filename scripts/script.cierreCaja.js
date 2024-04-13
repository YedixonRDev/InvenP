$(document).ready(function() {
  loadTableCierreCaja();
  onSubmitFrmInsertCierreCaja();
});

const onSubmitFrmInsertCierreCaja = () => {
  $('#frmInsertCierreCaja').submit(function(e) {
      e.preventDefault();
      let fecha = $('#frmInsertCierreCajaFecha').val();
      let gastos = $('#frmInsertCierreCajaGastos').val();
      let efectivo = $('#frmInsertCierreCajaEfectivo').val();
      let venta= $('#frmInsertCierreCajaVenta').val();
      let data = {
          "fecha": fecha, 
          "gasto_total": gastos,
          "efectivo_total": efectivo,
          "venta_total": venta    
      };
      sendDataInsertCierraCaja(data);
  });
  console.log("Datos del cierre de caja enviado")
};

const sendDataInsertCierraCaja = (sendData) => {
  $.ajax({
      type: 'POST',
      url: 'api/data/cierreCaja.php', 
      data: JSON.stringify(sendData),
      contentType: 'application/json',
      dataType: 'json'
  })
  .done(function(data) {
      if (data.status) {
          insetDataCierreCajaSuccess();
          loadTableCierreCaja();
      }
  })
  .fail(function(data) {
      console.log(data);
  });
};

const insetDataCierreCajaSuccess = () => {
  frmInsertCierreCajaClean();
};

const frmInsertCierreCajaClean = () => {
  $('#frmInsertCierreCaja')[0].reset();
};

const loadTableCierreCaja = () => {
  $('#tblCierreCaja').dataTable({
      "aProcessing": true,
      "aServerSide": true,
      dom: 'Bfrtip',
      buttons: [ 'excelHtml5'],
      "ajax":{
          url: 'api/data/cierreCaja.php',
          type : "get",
          dataType : "json",            
          error: function(e){
              console.log(e.responseText);  
          }
      },
      "bDestroy": true,
      "iDisplayLength": 7,
      "columns":[
          { data: 'fecha' },
          { data: 'gasto_total' },
          { data: 'efectivo_total' },
          { data: 'venta_total' }
      ]
  }).DataTable();
};


const showModalCierreCaja  = () =>{
  $('#modalCierreCaja').modal('show')
}