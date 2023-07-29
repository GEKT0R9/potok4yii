let count = document.getElementById('count');
const dropdown = document.getElementsByClassName('field-editaddbouquetform-flowers')[0];
let oldCount = 3;
let flowersDiv = document.getElementById('flowers');


count.addEventListener('change', () => {
    getData();
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

async function uploadData() {
    let response = await fetch('/api/settings/add-color', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body:JSON.stringify({
            name: 'John'
        })
    });
    console.log(response.json());
}

async function getData() {
    let response = await fetch('/api/settings/color-dir');
    console.log(response.json());
}

