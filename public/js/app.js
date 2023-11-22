// cart AJAX
document.addEventListener('DOMContentLoaded', function() {
    let quantityInputs = document.querySelectorAll('.quantity-input');
    let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

    function updateTotalPrice(){
        let priceSpans = document.querySelectorAll('.price');

        let totalPrice = Array.from(priceSpans).reduce(function (total, priceSpan){
            return total + parseFloat(priceSpan.textContent);
        }, 0);

        let totalElement = document.querySelector('.total-price');

        totalElement.textContent = totalPrice.toFixed(2) + '€';
    }

    quantityInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            let productId = input.getAttribute('data-product-id');
            let quantity = input.value;

            fetch('/cart/' + productId, {
                method: 'PATCH', 
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ quantity: quantity })
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                console.log(data);

                let priceSpan = input.parentElement.nextElementSibling.querySelector('.price');

                priceSpan.textContent = (quantity * data.price).toFixed(2) + '€';

                updateTotalPrice();
            })
            .catch(function(error) {
                console.error(error);
            });
        });
    });
});