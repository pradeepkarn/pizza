<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @foreach($pizzas as $pizza)
                    <div class="col-md-4 mb-4">
                        <div class="card" data-pizza-id="{{ $pizza->id }}">
                            <div class="text-center">
                                <img style="height: 200px; width:200px; object-fit:contain;" src="{{ asset('images/pizzas/' . $pizza->image) }}" alt="{{ $pizza->name }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $pizza->type }}</h5>
                                <p class="card-text">{{ $pizza->size }}</p>
                               
                            </div>
                            <div class="card-footer">
                                <div>
                                    <select class="form-select size-select">
                                        @foreach ($pizza->attributes as $attr)
                                        <option value="{{ $attr->size }}" data-pizza-price="{{ $attr->price }}">{{ $attr->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="toppingsDropdown{{$pizza->id}}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Toppings
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="toppingsDropdown{{$pizza->id}}">
                                        <ul class="toppings-ul">
                                            <!-- Toppings based on selected size -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="add btn btn-primary btn-sm">+ Add</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="right-bar">
                    <h3>Order Summary</h3>
                    <table class="table" id="cart-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Size</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Cart items -->
                        </tbody>
                    </table>
                    <p id="order-total">Total Price: &#x20B9;<span>0.00</span></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sizeSelects = document.querySelectorAll('.size-select');
            var toppingsUl = document.querySelectorAll('.toppings-ul');
            var pizzaPriceSpan = document.querySelector('.pizza-price');
            var orderTotalSpan = document.querySelector('#order-total span');
            var cartTableBody = document.querySelector('#cart-table tbody');
            var orderTotalSpan = document.querySelector('#order-total span');
            var cart = [];
            var index = 1; 
            var toppingsData = @json($toppings);

            function updateToppingUl(toppingsUl, selectedSize) {
                toppingsUl.innerHTML = '';
                var ulElem = '';
                toppingsData.forEach(function(topping) {
                    if (topping.size === selectedSize) {
                        var Toptext = topping.name + ' - ₹' + topping.price;
                        ulElem += `
                        <li class="dropdown-item">
                            <input type="checkbox" data-name="${topping.name} value="${topping.id}" data-price="${topping.price}">
                            ${Toptext}
                        </li>
                    `;
                    }
                });
                toppingsUl.innerHTML = ulElem;
            }

            function handleSizeChange() {
                var selectedSize = this.value;
                var selectedPizza = this.closest('.card');
                var pizzaPrice = parseFloat(selectedPizza.getAttribute('data-pizza-price')) || 0;
                var toppingsUl = selectedPizza.querySelector('.toppings-ul');
                updateToppingUl(toppingsUl, selectedSize);
                updateTotalPrice();
            }


            function handleToppingsChange() {
                updateTotalPrice();
            }

         
            sizeSelects.forEach(function(sizeSelect) {
                sizeSelect.addEventListener('change', handleSizeChange);
            });

            toppingsUl.forEach(function(ul) {
                ul.addEventListener('change', handleToppingsChange);
            });

            // Handle the "Add" button click
            document.querySelectorAll('.add').forEach(function(addButton) {
                addButton.addEventListener('click', function() {
                    var selectedPizza = this.closest('.card');
                    var pizzaId = selectedPizza.getAttribute('data-pizza-id');
                    var pizzaName = selectedPizza.querySelector('.card-title').innerText;
                    var pizzaSize = selectedPizza.querySelector('.size-select').value;
                    var pizzaPrice = parseFloat(selectedPizza.querySelector('.size-select option:checked').getAttribute('data-pizza-price')) || 0;
                    var toppingsUl = selectedPizza.querySelector('.toppings-ul');
                    var selectedToppings = toppingsUl.querySelectorAll('input[type="checkbox"]:checked');
                    var toppingsArray = [];

                    selectedPizza.classList.add('selected'); // Mark selected pizza

                    // Create an array for selected toppings
                    selectedToppings.forEach(function(topping) {
                        var toppingId = topping.value;
                        var toppingPrice = parseFloat(topping.getAttribute('data-price')) || 0;
                        var toppingName = topping.getAttribute('data-name');

                        toppingsArray.push({
                            "id": toppingId,
                            "price": toppingPrice,
                            "name": toppingName,
                        });
                    });

                    // JSON object for the selected pizza
                    var pizzaJson = {
                        "id": index,
                        "pizza_id": pizzaId,
                        "name": pizzaName,
                        "size": pizzaSize,
                        "price": pizzaPrice,
                        "toppings": toppingsArray
                    };
                    index++;

                    // Add the pizza JSON to the cart array
                    cart.push(pizzaJson);

                    // console.log(JSON.stringify(cart, null, 2));
                    selectedPizza.classList.remove('selected');
                    updateCartTable();
                });
            });

            sizeSelects.forEach(function(sizeSelect) {
                var toppingsUl = sizeSelect.closest('.card').querySelector('.toppings-ul');
                updateToppingUl(toppingsUl, sizeSelect.value);
              
            });



            function updateCartTable() {
                cartTableBody.innerHTML = '';
                cart.forEach(function(item) {
                    var row = cartTableBody.insertRow();
                    var cellIndex = row.insertCell(0);
                    var cellName = row.insertCell(1);
                    var cellSize = row.insertCell(2);
                    var cellPrice = row.insertCell(3);
                    cellIndex.innerText = item.id;
                    cellName.innerText = item.name;
                    cellSize.innerText = item.size;
                    cellPrice.innerText = '₹' + item.price.toFixed(2);

                    // Display toppings if available
                    if (item.toppings.length > 0) {
                        var toppingsList = item.toppings.map(function(topping) {
                            return topping.name + ' - ₹' + topping.price;
                        }).join(', ');

                        cellName.innerText += ' (' + toppingsList + ')';
                    }
                });

                // Calculate and update the total price
                var totalPrice = cart.reduce(function(sum, item) {
                    var pizzaPrice = item.price || 0;
                    var toppingsPrice = item.toppings.reduce(function(toppingSum, topping) {
                        return toppingSum + topping.price;
                    }, 0);
                    return sum + pizzaPrice + toppingsPrice;
                }, 0);


                orderTotalSpan.innerText = '₹' + totalPrice.toFixed(2);
            }

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>