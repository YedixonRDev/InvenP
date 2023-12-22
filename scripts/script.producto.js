$(document).ready(function() {
   document.title = "Producto";
   validationUrl();
   productLoad();
   managerFormSearchProduct();
   loadBodyComplete();
   scrollToTop();
});

let product=null;
let dataProduct = {};

const validationUrl = () =>{
   let result = getUrl('code');
   if(result){
      product=result;
   }
}

const productLoad = () =>{
   apiManager.post('client/products/'+product, {})
   .then(response => {
      productProcess(response);
   })
   .catch(error => {
      console.error('POST error:', error);
   });
}

const productProcess = (response) =>{
   let data = response.result.rows[0];
   dataProduct=data;
   $('#dataProduct').html(data.product);
   $('#dataDescription').html(data.description);
   $('#dataPrice').html(monedaCop(data.price));
   $('#dataCode').html(data.code);
   $('#dataBrand').html(data.brand);
   $('#dataCategory').html(data.category);
   $('#dataInventory').html(data.inventory);
   $("#productGaleryView").html('');
   $("#productGaleryView").append(`<a class="image image--type--product" href="assets/imgs/products/${data.img}" target="_blank" data-width="700" data-height="700">
      <div class="image__body">
       <img class="image__tag" src="assets/imgs/products/${data.img}" alt="" />
      </div>
   </a>`);
   $("#productGalerySmall").html('');
   $("#productGalerySmall").append(`<div class="product-gallery__thumbnails-item image image--type--product img_galery_small">
      <div class="image__body ">
         <img class="image__tag " src="assets/imgs/products/${data.img}" alt="" />
      </div>
   </div>`);
   productGalleryCarouselInit();
}

const processAddProduct = () =>{
   let unitProduct = parseInt($('#unitProduct').val());
   let newProduct = {
      img: dataProduct.img,
      brand: dataProduct.brand,
      idbrand: dataProduct.idbrand,
      category: dataProduct.category,
      idcategory: dataProduct.idcategory,
      code: dataProduct.code,
      product: dataProduct.product,
      price: dataProduct.price, 
      units: unitProduct
   };
   appCart.addProduct(newProduct);
   urlDir('carrito');
}