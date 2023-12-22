$(document).ready(function() {
    document.title = "Productos";
    validationUrl();
    productsCategoriesLoad();
    productsListLoad();
    loadBodyComplete();
    scrollToTop();
});

let filters = {
    "filterProduct": false,
    "filterCategory": false,
    "filterPage": false
}

const validationUrl = () =>{
    let result = getUrl('product');
    if(result){
        filters.filterProduct=result.toUpperCase()
        filters.filterPage=false
    }
}

const prepareDataProduct = () =>{
    let postData = {};
    if (filters.filterProduct) {
        postData.product=filters.filterProduct;
    }
    if (filters.filterCategory) {
        postData.category=filters.filterCategory;
    }
    if (filters.filterPage) {
        postData.page=filters.filterPage;
    }
    return postData;
}

const productsCategoriesLoad = () =>{
    console.log('hola');
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
    $("#productsProductsCategories").html(''); 
    data.forEach((categories) => {
        $( "#productsProductsCategories" ).append(`<label class="filter-list__item">
            <span class="input-check filter-list__input">
                <span class="input-check__body">
                    <input class="input-check__input" type="checkbox">
                    <span class="input-check__box"></span>
                    <span class="input-check__icon">
                        <svg width="9px" height="7px">
                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"></path>
                        </svg>
                    </span>
                </span>
            </span>
            <input class="input-select_category" type="hidden" value="${categories.id}">
            <span class="filter-list__title">${categories.category}</span>
        </label>`);
    });
    productsCategoriesSelect();
}

const productsCategoriesSelect = () =>{
    const checkboxes = $('#productsProductsCategories .input-check__input');
    checkboxes.on('change', (event) => {
        const checkbox = $(event.target);
        if (checkbox.prop('checked')) {
            checkboxes.each((index, cb) => {
                if (cb !== checkbox[0]) {
                    $(cb).prop('checked', false);
                }
            });
            //const selectCategory = checkbox.closest('.filter-list__item').find('.filter-list__title').text();
            const selectCategory = checkbox.closest('.filter-list__item').find('input[type="hidden"]').val();
            filters.filterCategory=selectCategory;
        }
    }); 
}

const productsListLoad = () =>{
    let postData = prepareDataProduct();
	apiManager.post('client/products/', postData)
  	.then(response => {
        productsListProcess(response);
  	})
  	.catch(error => {
    	console.error('POST error:', error);
  	});
}

const productsListProcess = (response) =>{
    let data = response.result.data;
    let page = response.result.page;
    let perPage = response.result.perPage;
    let totalProducts = response.result.total;
    let pages = Math.ceil(totalProducts/perPage);
    $("#productsProductsList").html(''); 
    data.forEach((products) => {
        $("#productsProductsList").append(`<div class="products-list__item">
            <div class="product-card">
                <div class="product-card__image">
                    <div class="image image--type--product">
                        <a class="image__body">
                            <img class="image__tag" src="assets/imgs/products/${products.img}" alt="">
                        </a>
                    </div>
                </div>
                <div class="product-card__info">
                    <div class="product-card__meta"><span class="product-card__meta-title">Ref: </span>${products.code}</div>
                    <div class="product-card__name">
                        <div>
                            <div class="product-card__badges">
                            </div><a >${products.product}</a>
                        </div>
                    </div>
                    <div class="product-card__features">
                        <ul>
                            <li>categoria: ${products.category}</li>
                            <li>marca: ${products.brand}</li>
                            <li>unidades: ${products.inventory}</li>
                        </ul>
                    </div>
                </div>
                <div class="product-card__footer">
                    <div class="product-card__prices">
                        <div class="product-card__price product-card__price--current">
                        ${monedaCop(products.price)}
                        </div>
                    </div>
                    <button class="product-card__addtocart-icon" type="button" 33 onclick="redirectProduct('${products.code}')" aria-label="Add to cart">
                        <svg width="20" height="20"> 
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="15" cy="17" r="2"></circle>
                            <path   d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                    V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                    C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z">
                            </path>
                        </svg>
                    </button> 
                    <button class="product-card__addtocart-full" 44 onclick="redirectProduct('${products.code}')" type="button">Agregar</button> 
                </div>
            </div>
        </div>`);
    });
    productsListPaginationProcess(page,pages);
}

const productsListPaginationProcess = (page, pages)=>{
    let pageback =page-1;
    let pageNext =page+1;
    let pageNextPlus =page+2;
    let btnsPagination = '';
    let btnLeft = '';
    let btnRight = '';
    let btnNext ='';
    let btnNextPlus ='';
    let btnPages = '';
    let btnSeparator = 
    '<li class="page-item page-item--dots">'+
        '<div class="pagination__dots"></div>'+
    '</li>';
    if (page==1) {
        btnLeft =
        '<li class="page-item disabled">'+
            '<a class="page-link page-link--with-arrow" aria-label="Previous">'+
                '<span class="page-link__arrow page-link__arrow--left" aria-hidden="true">'+
                    '<svg width="7" height="11">'+
                        '<path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"></path>'+
                    '</svg>'+
                '</span>'+
            '</a>'+
        '</li>';
    }else{
        btnLeft =
        '<li class="page-item ">'+
            '<a class="page-link page-link--with-arrow" aria-label="Previous" onclick="paginationBtn('+pageback+')">'+
                '<span class="page-link__arrow page-link__arrow--left" aria-hidden="true">'+
                    '<svg width="7" height="11">'+
                        '<path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"></path>'+
                    '</svg>'+
                '</span>'+
            '</a>'+
        '</li>';
    }
    if (page>=pages) {
        btnRight =
        '<li class="page-item disabled">'+
            '<div class="page-link page-link--with-arrow"  aria-label="Next">'+
                '<span class="page-link__arrow page-link__arrow--right" aria-hidden="true">'+
                    '<svg width="7" height="11">'+
                        '<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"></path>'+
                    '</svg>'+
                '</span>'+
            '</div>'+
        '</li>';
    }else{
        btnRight =
        '<li class="page-item">'+
            '<div class="page-link page-link--with-arrow"  aria-label="Next" onclick="paginationBtn('+pageNext+')" >'+
                '<span class="page-link__arrow page-link__arrow--right" aria-hidden="true">'+
                    '<svg width="7" height="11">'+
                        '<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"></path>'+
                    '</svg>'+
                '</span>'+
            '</div>'+
        '</li>';
    }

    if (pageNext<pages) {
        btnNext='<li class="page-item "><div class="page-link" onclick="paginationBtn('+pageNext+')" >'+pageNext+'</div></li>';
    }

    if (pageNextPlus>pageNext && pageNextPlus<pages) {
        btnNextPlus='<li class="page-item "  ><div class="page-link" onclick="paginationBtn('+pageNextPlus+')" >'+pageNextPlus+'</div></li>';
    }

    if (pages>=pageNextPlus){
        btnPages = '<li class="page-item"><div class="page-link" onclick="paginationBtn('+pages+')">'+pages+'</div></li>';
    }

    console.log
    btnsPagination = 
    btnLeft+
    btnSeparator+
    '<li class="page-item active"><div class="page-link" >'+page+'</div></a></li>'+
    btnNext+
    btnNextPlus+
	btnSeparator+
	btnPages+
	btnRight;
    $('#productsProductsListPagination').html(btnsPagination);
}

const categoryFilterBtnSelect = () =>{
    filters.filterPage= false;
    productsListLoad();
}

const categoryFilterBtnReset = () =>{
    $('#productsProductsCategories  .input-check__input').prop('checked', false);
    filters.filterProduct= false;
    filters.filterCategory= false;
    filters.filterPage= false;
    productsListLoad();
}

const paginationBtn = (page) =>{
    filters.filterPage = page;
    productsListLoad();
    scrollToTop();
} 


const formSearchProduct = (data) =>{
    filters.filterProduct=data.get('search_product').toUpperCase();
    productsListLoad();
}

const redirectProduct = (code) =>{
    urlDir('producto?code='+code);
}

const formManagerWeb = new FormManager('frm_product_search_web',['input_product_search_web'],formSearchProduct );
const formManagerMovil = new FormManager('frm_product_search_movil',['input_product_search_movil'],formSearchProduct );