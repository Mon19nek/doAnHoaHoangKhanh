/**
 * Home Page
 */
// ready
$(document).ready(function() {
    getAllProducts();
    getHotProducts();
})

// get all products
function getAllProducts() {
    $.ajax({
        url: 'http://localhost/api/products/index.php',
        type: 'GET',
        success: function(data) {
            var productList = JSON.parse(data)
            renderProductListUI(productList)
        },
        error: function(e) {
            console.log(e.message);
        }
    });
}
// showAllProducts
function renderProductListUI(productList) {
    productList.forEach(product => {
        $('#product-list').append(
            `
            <div class="col-3 m-0 p-0">
            <a style="text-decoration: none" href="detail.html?productId=${product.id}">
            
            <div class="col-10 me-4 text-center">
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
                                <p><span class="text-primary">$${product.price}</p>
                            </div>
                        </div>
                    </div>       
                </div>
                </a>        
            
            </div>
            `
        )
    });
}
