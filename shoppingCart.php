<?php
/* 
include 'auth.php'; 
if (!checkAuth()) { // Se non è loggato
  header('Location: login.php'); // Vai alla pagina di login
  exit; // Esci
}*/

/* DA IMPLEMENTARE
LEGGE DALLA SESSIONE LA LISTA DEI GIOCHI DA COMPRARE e li elabora
inserendo un ordine nel database (addCart.php)
*/
 
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/shopcart.css">
    <script src="scripts/shopcart.js" defer="true"></script>

    <title>RetroBasket</title>
</head>

<body>

    <main>
        
    
        <h1><a id ="offTitle" href="index.php">&nbsp&nbspRetroMuseum</a></h1>
        <div class="basket">


            <div class="basket-header">
                
                <h1>Carrello(da implementare)</h1>
            </div>
        
        
        
            <div class="basket-labels">
                <ul>
                    <li class="item item-heading">Item</li>
                    <li class="price">Price</li>
                    <li class="quantity">Quantity</li>
                    <li class="subtotal">Subtotal</li>
                </ul>
            </div>
            <div class="basket-product">
                <div class="item">
                    <div class="product-image">
                        <img src="./images/blank.jpg" alt="Placholder Image 2" class="product-frame">
                    </div>
                    <div class="product-details">
                        <h1><strong><span class="item-quantity">4</span> x Eliza J</strong> Lace Sleeve Cuff Dress</h1>
                        <p><strong>Navy, Size 18</strong></p>
                        <p>Product Code - 232321939</p>
                    </div>
                </div>
                <div class="price">26.00</div>
                <div class="quantity">
                    <input type="number" value="4" min="1" class="quantity-field">
                </div>
                <div class="subtotal">104.00</div>
                <div class="remove">
                    <button>Remove</button>
                </div>
            </div>
            <div class="basket-product">
                <div class="item">
                    <div class="product-image">
                        <img src="./images/blank.jpg" alt="Placholder Image 2" class="product-frame">
                    </div>
                    <div class="product-details">
                        <h1><strong><span class="item-quantity">4</span> x Eliza J</strong> Lace Sleeve Cuff Dress</h1>
                        <p><strong>Nasddy, Size 18</strong></p>
                        <p>Product Code - 232321939</p>
                    </div>
                </div>
                <div class="price">16.00</div>
                <div class="quantity">
                    <input type="number" value="2" min="1" class="quantity-field">
                </div>
                <div class="subtotal">12.00</div>
                <div class="remove">
                    <button>Remove</button>
                </div>
            </div>
            <div class="basket-product">
                <div class="item">
                    <div class="product-image">
                        <img src="./images/blank.jpg" alt="Placholder Image 2" class="product-frame">
                    </div>
                    <div class="product-details">
                        <h1><strong><span class="item-quantity">4</span> x Eliza J</strong> Lace Sleeve Cuff Dress</h1>
                        <p><strong>Navy, Size 18</strong></p>
                        <p>Product Code - 232321939</p>
                    </div>
                </div>
                <div class="price">26.00</div>
                <div class="quantity">
                    <input type="number" value="4" min="1" class="quantity-field">
                </div>
                <div class="subtotal">104.00</div>
                <div class="remove">
                    <button>Remove</button>
                </div>
            </div>
            <div class="basket-product">
                <div class="item">
                    <div class="product-image">
                        <img src="./images/blank.jpg" alt="Placholder Image 2" class="product-frame">
                    </div>
                    <div class="product-details">
                        <h1><strong><span class="item-quantity">1</span> x Whistles</strong> Amella Lace Midi Dress</h1>
                        <p><strong>Navy, Size 10</strong></p>
                        <p>Product Code - 232321939</p>
                    </div>
                </div>
                <div class="price">26.00</div>
                <div class="quantity">
                    <input type="number" value="1" min="1" class="quantity-field">
                </div>
                <div class="subtotal">26.00</div>
                <div class="remove">
                    <button>Remove</button>
                </div>
            </div>
        </div>
        <aside>
            <div class="summary">
                <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
                <div class="summary-subtotal">
                    <div class="subtotal-title">Subtotal</div>
                    <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
                    <div class="summary-promo hide">
                        <div class="promo-title">Promotion</div>
                        <div class="promo-value final-value" id="basket-promo"></div>
                    </div>
                </div>
                <div class="summary-delivery">
                    <select name="delivery-collection" class="summary-delivery-selection">
                        <option value="0" selected="selected">Spedizioni disponibili</option>
                        <option value="collection">Gratuita</option>
                        <option value="first-class">Fedex</option>
                        <option value="second-class">A cavallo</option>
                        <option value="signed-for">Extra Lusso</option>
                    </select>
                </div>
                <div class="summary-total">
                    <div class="total-title">Totale</div>
                    <div class="total-value final-value" id="basket-total">130.00</div>
                </div>
                <div class="summary-checkout">
                    <button class="checkout-cta">Paga</button>
                </div>
            </div>
        </aside>
    </main>
    


    
</body>

</html>