
const pizzaSession = Symbol();

/**
 * Gets a unique id (timestamp).
 * 
 */
const getSessionIdAsync = async function () {
    console.log("DOC ::: getSessionIdAsync");
    const response = await fetch('./bin/pizza-js-session.php');
    const data = await response.json();
    console.log(' - data:', data);
    pizzaSession = data;
    return data;
}();

console.log(' - pizza session id:', pizzaSession);

/**
 * Wait for DOM to load.
 */
window.addEventListener('DOMContentLoaded', (event) => {
    console.log("DOC ::: DOMContentLoaded");
    console.log("HELLO");
    let t = setInterval(() => {
        console.log(' - pizza session:', pizzaSession);
        clearInterval(t);
    }, 1000);
});

