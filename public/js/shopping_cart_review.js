const pluses = document.getElementsByClassName('plus');
const minuses = document.getElementsByClassName('minus');
const inputs = document.getElementsByClassName('products_number_inputs');

for (let i = 0; i < inputs.length; i++) {
    pluses[i].addEventListener('click', () => increaseProductNumber(i));
    minuses[i].addEventListener('click', () => decreaseProductNumber(i));
    inputs[i].addEventListener('change', () => print(i));
}

function print(i) {
    document.getElementById('form_' + i).submit();
}

function increaseProductNumber (i) {
    const inputProductsNumber = document.getElementById('products_number_' + i);
    const currentNumber = inputProductsNumber.value;
    inputProductsNumber.value = parseInt(currentNumber) + 1;
    document.getElementById('form_' + i).submit();
}

function decreaseProductNumber (i) {
    const inputProductsNumber = document.getElementById('products_number_' + i);
    const currentNumber = inputProductsNumber.value;
    const newValue = parseInt(currentNumber) - 1;
    if (newValue !== 0) {
        inputProductsNumber.value = newValue;
        document.getElementById('form_' + i).submit();
    }
}
