document.addEventListener('DOMContentLoaded', () => {
    let iconCart = document.querySelector('.navbar-brand2');
    let cartCount = iconCart.querySelector('span');
    let body = document.querySelector('body');

    // Toggle cart visibility
    iconCart.addEventListener('click', (event) => {
        event.preventDefault();
        body.classList.toggle('showCart');
    });

    // Select all add to cart buttons
    let addCartButtons = document.querySelectorAll('.addCart');

    addCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            let productItem = event.target.closest('.product_items');
            let productImage = productItem.querySelector('img').src;
            let productName = productItem.querySelector('.title_product').textContent;
            let productPrice = productItem.querySelector('.price_product').textContent;
            addToCart(productImage, productName, productPrice);
            updateCartCount();
        });
    });

    function addToCart(image, name, price) {
        let cartList = document.querySelector('.listCart');
        let cartItems = cartList.querySelectorAll('.item');
        let isProductInCart = false;

        cartItems.forEach(item => {
            let itemName = item.querySelector('.name').textContent;
            if (itemName === name) {
                let quantityElement = item.querySelector('.quantity span:nth-child(2)');
                quantityElement.textContent = parseInt(quantityElement.textContent) + 1;
                isProductInCart = true;
            }
        });

        if (!isProductInCart) {
            let newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.innerHTML = `
                <div class="image">
                    <img src="${image}" alt="">
                </div>
                <div class="name">
                    ${name}
                </div>
                <div class="totalPrice">
                    ${price}
                </div>
                <div class="quantity">
                    <span class="minus">&lt;</span>
                    <span>1</span>
                    <span class="plus">&gt;</span>
                </div>
            `;

            // Add event listeners to the new plus and minus buttons
            newItem.querySelector('.plus').addEventListener('click', (event) => {
                let quantityElement = event.target.previousElementSibling;
                quantityElement.textContent = parseInt(quantityElement.textContent) + 1;
            });

            newItem.querySelector('.minus').addEventListener('click', (event) => {
                let quantityElement = event.target.nextElementSibling;
                let currentQuantity = parseInt(quantityElement.textContent);
                if (currentQuantity > 1) {
                    quantityElement.textContent = currentQuantity - 1;
                }
            });

            cartList.appendChild(newItem);
        }
    }

    function updateCartCount() {
        let currentCount = parseInt(cartCount.textContent);
        cartCount.textContent = currentCount + 1;
    }
});
