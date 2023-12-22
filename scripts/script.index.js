$(document).ready(function() {
    document.title = "dashboard";
    productsNewLoad();
    productsPromotionLoad();
    productsCategoriesLoad();
    productsBrandsLoad();
    managerFormSearchProduct();
    loadBodyComplete();
    scrollToTop();
});

const productsNewLoad = () =>{
	let postData = {
		"productnew": true,
        "perPage": 10
  	}
	apiManager.post('client/products/', postData)
  	.then(response => {
        productsNewData(response);
  	})
  	.catch(error => {
    	console.error('POST error:', error);
  	});
}

const productsNewData = (response) =>{
    const dataProducts = response.result.data;
    const groupedProducts = [];
    for (let i = 0; i < dataProducts.length; i += 2) {
        const productGroup = dataProducts.slice(i, i + 2);
        groupedProducts.push(productGroup);
    }
    productsNewProcess(groupedProducts);
}

const productsNewProcess = (data) =>{
    $("#indexProductsNew").html('');
    data.forEach((products) => {
        $( "#indexProductsNew" ).append(`<div class="block-products-carousel__column">
            <div class="block-products-carousel__cell">
                <div class="product-card product-card--layout--horizontal">
                    <div class="product-card__image">
                        <div class="image image--type--product">
                            <a href="product" class="image__body"><img class="image__tag"
                                    src="assets/imgs/products/${products[0].img}" alt="" /></a>
                        </div>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <div>
                                <a href="product">${products[0].product}</a>
                            </div>
                        </div>
                        <div class="product-card__rating">
                            <div class="tag-badge tag-badge--new">Nuevo</div>  
                        </div>
                    </div>
                    <div class="product-card__footer">
                        <div class="product-card__prices">
                            <div class="product-card__price product-card__price--current">
                            ${monedaCop(products[0].price)}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-products-carousel__cell">
                <div class="product-card product-card--layout--horizontal">
                    <div class="product-card__image">
                        <div class="image image--type--product">
                            <a href="product-full.html" class="image__body"><img class="image__tag"
                                    src="assets/imgs/products/${products[1].img}" alt="" /></a>
                        </div>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__name">
                            <div>
                                <a href="product">${products[1].product}</a>
                            </div>
                        </div>
                        <div class="product-card__rating">
                            <div class="tag-badge tag-badge--new">Nuevo</div>
                        </div>
                    </div>
                    <div class="product-card__footer">
                        <div class="product-card__prices">
                            <div class="product-card__price product-card__price--current">
                                ${monedaCop(products[1].price)}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`);
    });
    productsNewCarousel();
}

const productsPromotionLoad = () =>{
	let postData = {
		"discount": true,
        "perPage": 6
  	}
	apiManager.post('client/products/', postData)
  	.then(response => {
        productsPromotionProcess(response);
  	})
  	.catch(error => {
    	console.error('POST error:', error);
  	});
}

const productsPromotionProcess = (response) =>{
    let data = response.result.data;
    $("#indexProductsPromotion").html('');
    data.forEach((products) => {
        $( "#indexProductsPromotion" ).append(`<div class="block-sale__item">
            <div class="product-card">
                <div class="product-card__image">
                    <div class="image image--type--product">
                        <a href="product-full.html" class="image__body">
                            <img class="image__tag" src="assets/imgs/products/${products.img}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="product-card__info">
                    <div class="product-card__meta">
                        <span class="product-card__meta-title">Ref:</span>
                        ${products.code}
                    </div>
                    <div class="product-card__name">
                        <div>
                            <a href="product">${products.product}</a>
                        </div>
                    </div>
                    <div class="product-card__rating" style="text-decoration: line-through; color:#ee5253">
                    ${monedaCop(products.oldprice)}
                    </div>
                </div>
                <div class="product-card__footer">
                    <div class="product-card__prices">
                        <div class="product-card__price product-card__price--current">
                        ${monedaCop(products.price)}
                        </div>
                    </div>
                    <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                        <svg width="20" height="20">
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="15" cy="17" r="2" />
                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                        V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                        C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>`);
    });
    productsPromotionCarousel();
}

const productsCategoriesLoad = () =>{
	let postData = {}
	apiManager.post('client/categories/', postData)
  	.then(response => {
        productsCategoriesProcess(response);
  	})
  	.catch(error => {
    	console.error('POST error:', error);
  	});
}

const productsCategoriesProcess = (response) =>{
    let data = response.result.data;
    $("#indexProductsCategories").html(''); 
    let totalProducts = 0;
    data.forEach((categories) => {
        totalProducts= totalProducts+categories.products;
        $( "#indexProductsCategories" ).append(`<li class="categories-list__item">
            <a href="#">
                <div class="image image--type--category">
                    <div class="image__body">
                        <img class="image__tag" src="assets/imgs/categories/${categories.img}" alt="" />
                    </div>
                </div>
                <div class="categories-list__item-name">
                    ${categories.category}
                </div>
            </a>
            <div class="categories-list__item-products">${categories.products} Articulos </div>
        </li>
        <li class="categories-list__divider"></li>`);
    });

    $( "#indexProductsCategories" ).append(`<li class="categories-list__item">
            <a href="#">
                <div class="image image--type--category">
                    <div class="image__body">
                        <img class="image__tag" src="assets/imgs/categories/category_all.png" alt="" />
                    </div>
                </div>
                <div class="categories-list__item-name">
                    Ver Todo
                </div>
            </a>
            <div class="categories-list__item-products">${totalProducts} Articulos </div>
        </li>
        <li class="categories-list__divider"></li>`);
}

const productsBrandsLoad = () =>{
	let postData = {}
	apiManager.post('client/brands/', postData)
  	.then(response => {
        productsBrandsProcess(response);
  	})
  	.catch(error => {
    	console.error('POST error:', error);
  	});
}

const productsBrandsProcess = (response) =>{
    let data = response.result.data;
    $("#indexProductsBrands").html(''); 
    data.forEach((brands) => {
        $( "#indexProductsBrands" ).append(`<li class="block-brands__item">
            <a href="#" class="block-brands__item-link">
                <img src="assets/imgs/brands/${brands.id}.png" alt="" />
            </a>
            </li>
			<li class="block-brands__divider" role="presentation"></li>`);
    });

}