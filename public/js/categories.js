const smallDevicesInputs = document.getElementsByClassName('small-device-input');
const bigDevicesInputs = document.getElementsByClassName('big-device-input');

for (let i = 0; i < smallDevicesInputs.length; i++) {
    smallDevicesInputs[i].addEventListener('change', submitSmallDeviceForm);
    bigDevicesInputs[i].addEventListener('change', submitBigDeviceForm);
}

const smallAscending = document.getElementById('ascending_checkbox');
const smallDescending = document.getElementById('descending_checkbox');
const bigAscending = document.getElementById('big_ascending_checkbox');
const bigDescending = document.getElementById('big_descending_checkbox');

smallAscending.addEventListener('click', setDescendingFalse);
smallDescending.addEventListener('click', setAscendingFalse);
bigAscending.addEventListener('click', setBigDescendingFalse);
bigDescending.addEventListener('click', setBigAscendingFalse);

// const pageLinks = document.getElementsByClassName('page-link');
// const pageItems = document.getElementsByClassName('page-item');

// for (let i = 0; i < pageLinks.length; i++) {
//     pageLinks[i].addEventListener('click', submitBigDeviceForm);
// }
//
// for (let i = 0; i < pageItems.length; i++) {
//     pageItems[i].addEventListener('click', submitBigDeviceForm);
// }

function setDescendingFalse() {
    smallDescending.checked = false;
}

function setAscendingFalse() {
    smallAscending.checked = false;
}

function setBigDescendingFalse() {
    bigDescending.checked = false;
}

function setBigAscendingFalse() {
    bigAscending.checked = false;
}

function submitSmallDeviceForm() {
    document.getElementById('small-device-form').submit();
    console.log('HEllo small');
}

function submitBigDeviceForm() {
    document.getElementById('big-device-form').submit();
    console.log('HEllo big');
}
