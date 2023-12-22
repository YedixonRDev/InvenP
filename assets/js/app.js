function urlDir(url) {
    switch (url) {
        case null:
            window.history.back();
            break;
        case false:
            location.reload();
            break;
        default:
            window.location.href = url;
            break;
    }
}

function getUrl(value) {
    const urlObj = new URL(window.location.href);
    return urlObj.searchParams.get(value);
}

const sessionStatus = () => {
    $.ajax({
        url: "php/session.php",
        method: "GET",
        dataType: "json",
    }).done(function (res) {
        let session = res.session_estatus;
        //session == false ?urlDir('login'):null;
    });
};

const monedaCop = (numero) => {
    numero = parseInt(numero); 
    numeroFormateado = numero.toLocaleString("es-CO", {
        style: "currency",
        currency: "COP",
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    });
    return numeroFormateado;
};

const loadBodyComplete = () =>{
    setTimeout(function() {
        $("#site_body_loader").slideUp(0);
        $("#site_body_main").slideDown(0);
    }, 500);  
}

const scrollToTop = () => {
    const scrollToTopDuration = 500; // Duración de la animación en milisegundos
    const scrollStep = -window.scrollY / (scrollToTopDuration / 15);
    const scrollInterval = setInterval(() => {
      if (window.scrollY !== 0) {
        window.scrollBy(0, scrollStep);
      } else {
        clearInterval(scrollInterval);
      }
    }, 15);
}

const managerFormSearchProduct = () =>{

    const generalFormSearchProduct = (data) =>{
        let product =data.get('search_product').toUpperCase();
        urlDir('productos?product='+product)
    }
    const generalFormManagerWeb = new FormManager('frm_product_search_web',['input_product_search_web'],generalFormSearchProduct );
    const generalFormManagerMovil = new FormManager('frm_product_search_movil',['input_product_search_movil'],generalFormSearchProduct );
}

const ValidateSessionPage = (url) =>{
    //const route = window.location.pathname;
    //const finalRoute = route.lastIndexOf("/");
    //const currentRoute= route.substring(finalRoute + 1);
    //console.log(currentRoute)
    const session = appSession.status();
    session!=false?urlDir(url):urlDir('login?goBack='+url); 
}

const dataGlobalCart = appCart.getCart();
$("#dataCartTotalValue").html(monedaCop(dataGlobalCart.totalValue));