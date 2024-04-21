$(document).ready(function() {
   loadTableNewUser();
   onSubmitFrmInsertNewUser();
});

const onSubmitFrmInsertNewUser = () => {
   $('#frmInsertNewUser').submit(function(e) {
       e.preventDefault();
       let name = $('#frmInsertNewUserName').val();
       let email = $('#frmInsertNewUserEmail').val();
       let password = $('#frmInsertNewUserPassword').val();
       let data = {
           "nombre": name, 
           "correo": email,
           "contraseña": password    
       };
       sendDataInsertNewUser(data);
   });
};

const sendDataInsertNewUser = (sendData) => {
   $.ajax({
       type: 'POST',
       url: 'api/data/user.php', 
       data: JSON.stringify(sendData),
       contentType: 'application/json',
       dataType: 'json'
   })
   .done(function(data) {
       if (data.status) {
           insetDataNewUserSuccess();
           loadTableNewUser();
       }
   })
   .fail(function(data) {
       console.log(data);
   });
};

const insetDataNewUserSuccess = () => {
   frmInsertNewUserClean();
};

const frmInsertNewUserClean = () => {
   $('#frmInsertNewUser')[0].reset();
};

