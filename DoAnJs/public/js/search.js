function getParam(param) {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    return urlParams.get(param)
}

$(document).ready(function() {
    var key = getParam('key')
    $.ajax({
        url: 'http://localhost/api/products/search.php?key=' + key,
        type: 'GET',
        success: function(data) {
            var productList = JSON.parse(data)
            renderProductListUI(productList)
        },
        error: function(e) {
            console.log(e.message);
        }
    });
})


// show Search Products
function renderProductListUI(productSearch) {
    productSearch.forEach(product => {
        $('#product-search').append(
            `

    <div class="col-3 me-4 text-center">
        <a style="text-decoration: none" href="detail.html?productId=${product.id}">

        <div class="item">
                        <div class="position-relative">
                            <img class="w-100" src="${product.image}" alt="Item 1">
                            <div class="overlay h-100">
                                <button class="btn btn-dark">+Add to Cart</button>
                            </div>
                        </div>
                        <div>
                            <div class="item-details">
                                <a class="text-m text-decoration-none  text-primary " href="">${product.name}</a>
                                <p><span class="text-secondary">${product.price}</p>
                            </div>
                        </div>
           
        </div>
        </a>    
    </div>
            `
        )
    });
}