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

          document.getElementById('selectedScore').textContent = value + ' / 5';
          document.getElementById('score').value = value;
      });
  });
});

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
