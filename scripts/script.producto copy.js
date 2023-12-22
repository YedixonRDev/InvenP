let product;

const getProduct =  async (id) =>{
   try {
      const result = await productManager.getProductByCode(id);
      $("#productName").html(result.producto);
      $("#productPrice").html(monedaCop(result.precio));
      $("#productCodigo").html(result.codigo);
      $("#productMarca").html('SIN DATO');
      $("#productInventario").html(result.inventario);
      $("#productCategoria").html(result.categoria);
      return result;
   }catch (error) {
      console.error('Error:', error);
   }
}

const initializeProduct = async () => {
   product = await getProduct(getUrlId());
};

initializeProduct();

const statusCart = () => {
   const products = localStorage.getItem('products');
   return products !== null;
}

const processAddProduct = () =>{
   let num = $("#numberProduct").val();
   let newProduct = {
      "categoria": product.categoria,
      "codigo": product.codigo,
      "producto": product.producto,
      "precio": product.precio,
      "cantidad": num,
      "total": product.precio*num
   }
   processProductCart(newProduct);
}

const unificarProductos = (array)=> {
   let productosUnificados = [];  
   array.forEach((producto) => {
      let index = productosUnificados.findIndex((p) => p.codigo === producto.codigo);
      if (index === -1) {
        productosUnificados.push({ ...producto });
      } else {
        productosUnificados[index].cantidad = String(
          parseInt(productosUnificados[index].cantidad) + parseInt(producto.cantidad)
        );
        productosUnificados[index].total += producto.total;
      }
   });
   return productosUnificados;
}

const  processProductCart = (producto)=> {
   if (statusCart()) {
      let productos = JSON.parse(localStorage.getItem('products'));
      productos.push(producto);
      localStorage.setItem('products', JSON.stringify(productos));
   } else {
      let productos = [producto];
      localStorage.setItem('products', JSON.stringify(productos));
   }
	window.location.href = "carrito";
}