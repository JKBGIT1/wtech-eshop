document.getElementById('plus').addEventListener('click', increaseProductNumber);
document.getElementById('minus').addEventListener('click', decreaseProductNumber);

function increaseProductNumber () {
    const inputProductsNumber = document.getElementById('products_number');
    const currentNumber = inputProductsNumber.value;
    inputProductsNumber.value = parseInt(currentNumber) + 1;
}

function decreaseProductNumber () {
    const inputProductsNumber = document.getElementById('products_number');
    const currentNumber = inputProductsNumber.value;
    const newValue = parseInt(currentNumber) - 1;
    if (newValue !== 0) {
        inputProductsNumber.value = newValue;
    }
}
