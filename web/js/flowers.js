let count = document.getElementById('count');
const dropdown = document.getElementsByClassName('field-editaddbouquetform-flowers')[0];
let oldCount = 3;
let flowersDiv = document.getElementById('flowers');


count.addEventListener('change', () => {
    if (count.value !== oldCount) {
        let query = document.querySelectorAll('.field-editaddbouquetform-flowers');
        for (const queryElement of query) {
            queryElement.remove();
        }
        for (let i = 0; i < count.value; i++) {
            flowersDiv.appendChild(dropdown.cloneNode(true));
        }
    }
    oldCount = count.value;
});

