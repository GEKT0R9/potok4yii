let count = document.getElementById('count');
const dropdown = document.getElementsByClassName('field-editaddbouquetform-flowers')[0];
let oldCount = 3;
let flowersDiv = document.getElementById('flowers');


count.addEventListener('click', () => {
    if (count.value > oldCount) {
        flowersDiv.appendChild(dropdown.cloneNode(true));
    } else {
        document.querySelector('.field-editaddbouquetform-flowers:last-child').remove();
    }
    oldCount = count.value;
});

