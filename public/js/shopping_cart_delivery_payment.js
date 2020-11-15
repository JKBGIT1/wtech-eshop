const radios = document.getElementsByClassName('form-check-input');
const goods = document.getElementById('goods');
const paymentAndDelivery = document.getElementById('payment-delivery');
const tax = document.getElementById('taxes');
const totalPrice = document.getElementById('total_price');

for (let i = 0; i < radios.length; i++) {
    radios[i].addEventListener('click', getSelectedRadios);
}

function getSelectedRadios() {
    let deliveryPrice;
    let paymentPrice;
    let selectedRadiosValues = [];

    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            selectedRadiosValues.push(radios[i].value);
        }
    }

    if (selectedRadiosValues[0] === '1') {
        deliveryPrice = 4;
    } else if (selectedRadiosValues[0] === '2') {
        deliveryPrice = 3;
    } else {
        deliveryPrice = 0;
    }

    if (selectedRadiosValues[1] === '1') {
        paymentPrice = 4;
    } else {
        paymentPrice = 0;
    }

    setValuesAboutOrder(deliveryPrice, paymentPrice);
}

function setValuesAboutOrder(deliveryPrice, paymentPrice) {
    let paymentAndDeliveryPrice = deliveryPrice + paymentPrice;
    paymentAndDelivery.innerHTML = paymentAndDeliveryPrice;
    tax.innerHTML = ((parseFloat(goods.innerHTML) + paymentAndDeliveryPrice) * 0.2).toFixed(2);
    totalPrice.innerHTML = parseFloat(goods.innerHTML) + deliveryPrice + paymentPrice;
}
