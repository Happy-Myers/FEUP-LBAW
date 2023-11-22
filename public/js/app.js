// cart AJAX
document.addEventListener('DOMContentLoaded', function() {
    let quantityInputs = document.querySelectorAll('.quantity-input');
    let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

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
            })
            .catch(function(error) {
                console.error(error);
            });
        });
    });
});