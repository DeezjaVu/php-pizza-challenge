# PHP Pizza Challenge

The goal is to use Javascript to call a PHP script.
The PHP script is used to calculate the total cost of a pizza based on the selections made (pizza size and toppings).

## Ceci n'est pas un défi

I've decided not to make this into a challenge afterall, as there's too many things involved that haven't been covered in the course, both on the PHP as well as the Javascript side.

* JSON encoding / decoding
* fetch
* await
* asynchronous methods

I'll simply put this up on Github so those that want to take a look at it can do so.

## How it works

* When the `Submit` button is clicked, a PHP script is called to initiate a session id.

    ```php
    if (empty($_SESSION['pizzaId'])) {
        $_SESSION['pizzaId'] = mktime();
    }
    ```
* When the session id is received, all the selected input field values are collected.

* Everything is then encoded to JSON and sent over to a PHP script.

* The PHP script loads a number of `json` files (two in this case) that contain the id's and prices of each pizza option.

* The price is then calculated for all matching options, encoded to JSON and then returned.

* Javascript receives the returned JSON, decodes and displays it.

* Note that the session id isn't being used. The idea was to implement some form of protection and prevent the PHP script from being called directly. The code is there, it's just not being used.

