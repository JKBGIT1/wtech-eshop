const price_from = document.getElementById('price_from');
const price_to = document.getElementById('price_to');
const big_price_from = document.getElementById('big_price_from');
const big_price_to = document.getElementById('big_price_to');

console.log(price_from);
console.log(price_to);

price_from.addEventListener('change', submitPriceForm);
price_to.addEventListener('change', submitPriceForm);

big_price_from.addEventListener('change', submitPriceForm);
big_price_to.addEventListener('change', submitPriceForm);

function submitPriceForm() {
    document.getElementById('price-form').submit();
}
