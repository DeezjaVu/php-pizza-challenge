
const SESSION_URL = "./bin/pizza-js-session.php";

/**
 * Gets a unique id (timestamp).
 * 
 */
const getSessionIdAsync = async function () {
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
    // Get session id
    getSessionIdAsync().then(async (pizza) => {
        console.log(' - pizza', pizza);
        // Get all checked inputs
        let matches = 'input[type="checkbox"]:checked, input[type="radio"]:checked';
        let checked = document.body.querySelectorAll(matches);
        console.log(' - checked:', checked);
        pizza.options = [];
        let len = checked.length;
        for (let i = 0; i < len; i++) {
            const el = checked[i];
            const val = el.value;
            console.log(' - value:', val);
            pizza.options.push(val);
            console.log(' - pizza:', pizza);
        }
        let json = JSON.stringify(pizza);
        let headers = {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        }
        // Send data to PHP
        let response = await fetch("./bin/pizza-price.php",
            {
                method: "POST",
                headers: headers,
                body: json
            });
        let data = await response.json();
        console.log(' - data:', data);
    });
}
