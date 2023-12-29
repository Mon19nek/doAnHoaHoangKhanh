function updateCartDisplay(cartData) {
    var cartItemsElement = document.getElementById("cart-items");
    var subtotalElement = document.getElementById("subtotal");
    var totalElement = document.getElementById("total");

    // Xóa các sản phẩm trong giỏ hàng
    while (cartItemsElement.firstChild) {
        cartItemsElement.removeChild(cartItemsElement.firstChild);
    }

    // Thêm sản phẩm vào giỏ hàng
    cartData.forEach(function(item) {
        var row = document.createElement("tr");

        var productName = document.createElement("td");
        productName.textContent = item.product_name;
        row.appendChild(productName);

        var productPrice = document.createElement("td");
        productPrice.textContent = item.product_price;
        row.appendChild(productPrice);

        var quantity = document.createElement("td");
        quantity.textContent = item.quantity;
        row.appendChild(quantity);

        var total = document.createElement("td");
        total.textContent = item.product_price * item.quantity;
        row.appendChild(total);

        cartItemsElement.appendChild(row);
    });

    // Cập nhật tổng phụ và tổng cộng
    var subtotal = calculateSubtotal(cartData);
    subtotalElement.textContent = subtotal;

    var total = calculateTotal(cartData);
    totalElement.textContent = total;
}

// Tính tổng phụ
function calculateSubtotal(cartData) {
    var subtotal = 0;
    cartData.forEach(function(item) {
        subtotal += item.product_price * item.quantity;
    });
    return subtotal;
}

// Tính tổng cộng (có thể áp dụng giảm giá, phí vận chuyển, ...)
function calculateTotal(cartData) {
    var total = calculateSubtotal(cartData);
    // Các phép tính khác có thể được thực hiện ở đây
    return total;
}
document.getElementById("addtocart").addEventListener("click", function() {

    function addToCart(productId, productName, productPrice) {
        var product = {
            id: productId,
            name: productName,
            price: productPrice
        };

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                updateCartDisplay(response);
            }
        };
        xmlhttp.open("POST", "http://localhost/api/cart/cart.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("product=" + JSON.stringify(product));
    }
});