document.getElementById('hotlineNumber').addEventListener('click', function() {
  const phoneNumber = this.textContent.trim();
  navigator.clipboard.writeText(phoneNumber).then(() => {
    alert('Số hotline ' + phoneNumber + ' đã được sao chép!');
  }).catch(err => {
    alert('Không thể sao chép số hotline.');
  });
});


/*BANNER CUỘN*/
document.addEventListener('DOMContentLoaded', () => {
  const banner = document.querySelector('.header-banner');
  const slides = Array.from(banner.querySelectorAll('.banner-slide'));
  const slideCount = slides.length;

  let index = 0;

  // Clone slide đầu tiên để tạo hiệu ứng vòng lặp mượt
  const firstClone = slides[0].cloneNode(true);
  banner.appendChild(firstClone);

  function moveBanner() {
    banner.style.transition = 'transform 0.8s ease-in-out';
    banner.style.transform = `translateX(-${index * (100 / slideCount)}%)`;
  }

  function moveNext() {
    index++;
    moveBanner();

    // Khi đến ảnh clone, reset về đầu
    if (index === slideCount) {
      setTimeout(() => {
        banner.style.transition = 'none';
        index = 0;
        banner.style.transform = 'translateX(0)';
      }, 800);
    }
  }

  // Tự động chuyển ảnh mỗi 4 giây
  setInterval(moveNext, 4000);
});
