
const SESSION_URL = "./php/pizza-js-session.php";
const GET_PRICE_URL = "./php/pizza-price.php";

/**
 * Gets a unique id (timestamp).
 * 
 */
async function getSessionIdAsync() {
    console.log("DOC ::: getSessionIdAsync");
    const response = await fetch(SESSION_URL);
    const data = await response.json();
    console.log(' - data:', data);
    return data;
};

/**
 * Wait for DOM to load.
 */
window.addEventListener('DOMContentLoaded', (event) => {
    console.log("DOC ::: DOMContentLoaded");
    let orderBtn = document.body.querySelector('#order-btn');
    orderBtn.addEventListener('click', orderClickHandler);
});

/**
 * 
 * @param {*} event 
 */
function orderClickHandler(event) {
    console.log("DOC ::: orderClickHandler");
    getSessionIdAsync().then(getPizzaPriceAsync);
}

/**
 * 
 * @param {*} result 
 */
async function getPizzaPriceAsync(result) {
    console.log("DOC ::: getPizzaPriceAsync");
    console.log(' - result:', result);

    let matches = 'input[type="checkbox"]:checked, input[type="radio"]:checked';
    let checked = document.body.querySelectorAll(matches);
    console.log(' - checked:', checked);
    // Since the sessionId (result) is already an object, 
    // we'll just tuck the selected options onto it.
    result.options = [];

    let len = checked.length;
    for (let i = 0; i < len; i++) {
        const el = checked[i];
        const val = el.value;
        console.log(' - value:', val);
        result.options.push(val);
    }
    console.log(' - result:', result);

    let json = JSON.stringify(result);
    console.log(' - json body:', json);

    let headers = {
        'Accept': 'application/json, text/plain, */*',
        'Content-Type': 'application/json'
    }
    // Send data to PHP and wait for response
    let response = await fetch(GET_PRICE_URL,
        {
            method: "POST",
            headers: headers,
            body: json
        });
    let data = await response.json();
    console.log(' - data:', data);
    let span = document.body.querySelector('#total-cost');
    span.innerText = `Total Cost: € ${data.price}`;
}
