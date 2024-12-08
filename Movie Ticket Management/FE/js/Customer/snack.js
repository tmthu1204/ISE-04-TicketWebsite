function increaseQuantity(item) {
    let quantityElement = document.getElementById(item + '-quantity');
    let currentQuantity = parseInt(quantityElement.textContent);
    quantityElement.textContent = currentQuantity + 1;
}

function decreaseQuantity(item) {
    let quantityElement = document.getElementById(item + '-quantity');
    let currentQuantity = parseInt(quantityElement.textContent);
    if (currentQuantity > 0) {
        quantityElement.textContent = currentQuantity - 1;
    }
}