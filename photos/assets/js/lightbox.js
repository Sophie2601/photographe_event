/*********/
// Lightbox Gallery
let currentImageIndex = 0; 
let images = [];           
let captions = []; 

function initializeLightboxData() {
    // Réinitialiser les tableaux pour s'assurer qu'ils ne contiennent pas d'éléments en double
    images = [];
    captions = [];
    
    // Considérer les images des deux sections
    document.querySelectorAll(".photo-une, .photo-deux").forEach((element) => {
        images.push(element.getAttribute("data-image-url"));
        captions.push(element.getAttribute("data-caption"));
    });
}

// Appeler cette fonction au chargement de la page pour initialiser
initializeLightboxData();

function openLightbox(index) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const caption = document.getElementById('caption');

    lightbox.style.display = "block";
    lightboxImage.src = images[index];
    caption.innerHTML = captions[index];
    currentImageIndex = index;
}

function closeLightbox() {
    document.getElementById('lightbox').style.display = "none";
}

function slideImage(step) {
    currentImageIndex += step;
    
    if (currentImageIndex >= images.length) currentImageIndex = 0;
    if (currentImageIndex < 0) currentImageIndex = images.length - 1;

    const lightboxImage = document.getElementById('lightboxImage');
    const caption = document.getElementById('caption');
    
    lightboxImage.src = images[currentImageIndex];
    caption.innerHTML = captions[currentImageIndex];
}
