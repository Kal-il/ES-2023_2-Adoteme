function changeImage(imageUrl) {
    document.getElementById('main-image').src = imageUrl;
}

window.onload = function() {
    document.getElementById('heart-icon').addEventListener('click', function() {
      this.classList.toggle('fas'); // filled heart icon
      this.classList.toggle('far'); // outline heart icon
    });
  }
  
