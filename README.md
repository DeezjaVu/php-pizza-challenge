# PHP Pizza Challenge #

The goal is to establish a communication between Javascript &mdash; either plain vanilla or jQuery &mdash; and PHP.
to calculate the total cost of a pizza based on the selections made (pizza size and toppings).

The `php-pizzza-challenge.html` file contains a number of input fields with two main sections (Size and Toppings) and each of those have several options to chose from:

 * Size

    * Small
    * Medium
    * Large
    * Extra Large

 * Toppings

    * Tomatoes
    * Onions
    * Pineapple
    * Olives
    * Green Peppers
    * Mushrooms
    * Spinach
    * Anchovies

If you've done the js-pizza-challenge, you'll notice the html pages are pretty much identical. The main difference is that here we got rid of the `<form>` element as we no longer need it, and the submit button &mdash; `<input type="submit">` &mdash; has been replaced with a regular `<button>` element. 

Last but not least, the input fields' `value` attribute no longer holds the price, but rather a unique identifier.

## Tasks ##

* Create an event handler for the submit button. 

## Challenge ##

* The `php-pizza-challenge.html` file needs to remain an `.html` file, meaning you can not change it to a `.php` file.

* Collect the unique identifiers of all the selected options and send it to a PHP script (via POST method).

* In the PHP script, calculate the total cost for the selected pizza options and return it.

* In the html file, display the result in the `<span>` element located at the bottom of the html page.

    ```html
    <span id="total-cost" class="font-weight-bold">Total Cost: € 00.00</span>
    ```

<!-- ## Bonus Challenge ##
* Instead of displaying the result when submitting the form, update the total cost every time an option is selected and/or changed.
 -->