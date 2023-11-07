var currentImageIndex = 0;
var galleryImages = [];
var galleryTitles = [];

function fetchGalleryData() {
    var items = document.querySelectorAll('.gallery-item');
    items.forEach(item => {
        var img = item.querySelector('img').src;
        var title = item.querySelector('.gallery-title').innerText;
        galleryImages.push(img);
        galleryTitles.push(title);
    });
}

function openLightboxWithImage(imageUrl, title) {
    currentImageIndex = galleryImages.indexOf(imageUrl);

    var lightbox = document.getElementById('lightbox');
    var lightboxImage = document.getElementById('lightboxImage');
    var caption = document.getElementById('caption');

    lightbox.style.display = 'block';
    lightboxImage.src = imageUrl;
    caption.innerHTML = title;
}

function slideImage(step) {
    currentImageIndex += step;

    if (currentImageIndex >= galleryImages.length) {
        currentImageIndex = 0;
    } else if (currentImageIndex < 0) {
        currentImageIndex = galleryImages.length - 1;
    }

    var lightboxImage = document.getElementById('lightboxImage');
    var caption = document.getElementById('caption');
    lightboxImage.src = galleryImages[currentImageIndex];
    caption.innerHTML = galleryTitles[currentImageIndex];
}

function closeLightbox() {
    var lightbox = document.getElementById('lightbox');
    lightbox.style.display = 'none';
}

// Init
document.addEventListener('DOMContentLoaded', fetchGalleryData);
