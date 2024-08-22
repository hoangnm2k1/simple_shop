<a href="#"><i class="fa fa-shopping-cart"></i>
    <span id="cart-quantity"></span>
    <span id="cart-total"></span>
    <i class="fa fa-angle-down"></i></a>

<div class="mini_cart" id="cart_mini"> </div>
<script>
    const viewCartUrl = @json(route('listCart.index'));

    function fetchCartData() {
        fetch('http://127.0.0.1:8000/api/cart')
            .then(response => response.json())
            .then(data => {
                if (data.products && data.products.length > 0) {
                    renderCart(data);
                } else {
                    document.getElementById("cart_mini").innerHTML = `
                        <div id="change-item-cart">
                            <p>Your cart is empty</p>
                        </div>
                    `;
                    updateCartInfo(0, 0);
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function renderCart(cart) {
        let cartItems = cart.products.map(item => {
            return `
                <div class="cart_item">
                    <div class="cart_img">
                        <a href="#"><img src="/dashboard/uploads/${item.productInfo.img_url}" height="100px" width="80px"></a>
                    </div>
                    <div class="cart_info">
                        <a href="#">${item.productInfo.name}</a>
                        <span class="cart_price">${Number(item.productInfo.price).toLocaleString()}</span>
                        <span class="quantity">Qty: ${item.quantity}</span>
                    </div>
                    <div class="cart_remove">
                        <i class="fa fa-times-circle" data-id="${item.productInfo.id}" onclick="deleteItem(${item.productInfo.id})"></i>
                    </div>
                </div>
            `;
        }).join("");

        document.getElementById("cart_mini").innerHTML = `
            <div id="change-item-cart">
                ${cartItems}
                <div class="total_price">
                    <span>Total quantity</span>
                    <span class="prices">${Number(cart.totalQuantity).toLocaleString()}</span>
                </div>
                <div class="total_price">
                    <span>Total money</span>
                    <span class="prices">${Number(cart.totalPrice).toLocaleString()}</span>
                </div>
            </div>
            <div class="cart_button">
                <a href="${viewCartUrl}">View cart</a>
            </div>
        `;
        updateCartInfo(cart.totalQuantity, cart.totalPrice);
    }

    function updateCartInfo(totalQuantity, totalPrice) {
        document.getElementById("cart-quantity").textContent = totalQuantity > 0 ? `(${totalQuantity} items)` : "(0 item)";
        document.getElementById("cart-total").textContent = totalPrice > 0 ? ` - ${Number(totalPrice).toLocaleString()} VNĐ` : " - 0 VNĐ";
    }

    fetchCartData();

//     function deleteItem(productId) {
//         let confirmed = confirm('Bạn có muốn xoá sản phẩm khỏi giỏ hàng không?');
//         if(confirmed) {
//             $.ajax({
//             url: '/api/cart-delete-item/' + productId,
//             type: 'GET',
//         }).done(function(response) {
//             console.log(productId);
//             console.log('Response:', response);
//             if(response) {
//                 fetchCartData();
//                 alertify.success("Đã xoá sản phẩm thành công");
//             } else {
//                 console.error('Error:', response.error);
//                 alertify.error("Không thể xóa sản phẩm");
//             }
//         })
//     }
// }

 function deleteItem(productId) {
    let confirmed = confirm('Bạn có muốn xoá sản phẩm khỏi giỏ hàng không?');
    if(confirmed) {
        fetch('/api/cart-delete-item/' + productId, {
            method: 'GET',
        })
        .then(response => response.json())
        .then(data => {
            console.log(productId);
            // console.log('Response:', data);
            if(data) {
                fetchCartData();
                alertify.success("Đã xoá sản phẩm thành công");
            } else {
                console.error('Error:', data.error);
                alertify.error("Không thể xóa sản phẩm");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alertify.error("Đã xảy ra lỗi khi xóa sản phẩm");
        });
    }
}

</script>