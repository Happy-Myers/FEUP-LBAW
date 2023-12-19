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
        let originalQuantity = input.value;

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

                originalQuantity = quantity;

                updateTotalPrice();
            })
            .catch(function(error) {
                console.error(error);

                input.value = originalQuantity;
            });
        });
    });
});

//review stars

document.addEventListener('DOMContentLoaded', function() {
  var stars = document.querySelectorAll('.star');

  stars.forEach(function(star) {
      star.addEventListener('click', function() {
          var value = this.dataset.value;

          stars.forEach(function(s) {
              s.classList.remove('fas');
              s.classList.add('far');
          });

          var currentStar = this;
          while (currentStar) {
              currentStar.classList.remove('far');
              currentStar.classList.add('fas');
              currentStar = currentStar.previousElementSibling;
          }
          document.getElementById('score').value = value;
      });
  });
});

//review character limit

document.addEventListener('DOMContentLoaded', function() {
    var commentInput = document.getElementById('comment');
    var charCount = document.getElementById('charCount');

    commentInput.addEventListener('input', function() {
        var currentLength = this.value.length;
        var maxLength = parseInt(this.getAttribute('maxlength'));
        var remaining = maxLength - currentLength;

        if (remaining < 0) {
            this.value = this.value.substring(0, maxLength);
            remaining = 0;
        }

        charCount.textContent = remaining;
    });
});

// stock AJAX

document.addEventListener('DOMContentLoaded', function() {
    let stockInputs = document.querySelectorAll('.stock-input');
    let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

    stockInputs.forEach(function(input) {
        let originalStock = input.value;

        input.addEventListener('input', function() {
            let productId = input.getAttribute('data-product-id');
            let stock = input.value;

            fetch('/admin/products/' + productId, {
                method: 'PATCH', 
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ stock: stock })
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                originalStock = stock;

                return response.json();
            })
            .catch(function(error) {
                console.error(error);

                input.value = originalStock;
            });
        });
    });
});