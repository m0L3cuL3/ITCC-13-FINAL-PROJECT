if(document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('removeBtn')
    for (var i = 0; i < removeCartItemButtons.length; i++){
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('item-quantity')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName('add-to-cart')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }

    document.getElementsByClassName('checkoutBtn')[0].addEventListener('click', checkoutClicked)
}

function checkoutClicked() {
    alert('Thank you for your purchase')
    var cartItems = document.getElementsByClassName('chosen-product-container')[0]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()
}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement.parentElement.parentElement
    var title = shopItem.getElementsByClassName('product-name')[0].innerText
    var price = shopItem.getElementsByClassName('item-price')[0].innerText
    // console.log(title, price)
    addItemtoCart(title, price)
    updateCartTotal()
}

function addItemtoCart(title, price) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('chosen-product-item-list')
    var cartItems = document.getElementsByClassName('chosen-product-container')[0]
    var cartItemNames = cartItems.getElementsByClassName('product-name')
    for (var i = 0; i < cartItemNames.length; i++) {
        if(cartItemNames[i].innerText == title) {
            alert('This item is already added to the cart')
            return
        }
    }
    var cartRowContents = `<div class="chosen-product-details">
                                <p class="product-name" id="product-name-cart">
                                    ${title}
                                </p>
                                <p class="item-price" id="cart-item-price">
                                    ${price}
                                </p>
                            </div>
                            <div class="chosen-product-functions">
                                <input type="number" class="item-quantity" value="1">
                                <button class="removeBtn"><i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('removeBtn')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('item-quantity')[0].addEventListener('change', quantityChanged)
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('chosen-product-container')[0]
    var cartRows = cartItemContainer.getElementsByClassName('chosen-product-item-list')
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('item-price')[0]
        var quantityElement = cartRow.getElementsByClassName('item-quantity')
        [0]
        var price = parseFloat(priceElement.innerText.replace('Php ', ''))
        var quantity = quantityElement.value
        total = total + (price * quantity)
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('total-price')[0].innerText = 'Total: Php ' + total
}