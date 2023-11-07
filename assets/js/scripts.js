// Popup
const lienPopupContact = document.getElementById("ouvrirPopupContact");
const popupContact = document.getElementById("popupContact");
const boutonFermerContact = document.getElementById("fermerPopupContact");

lienPopupContact.addEventListener("click", (e) => {
  e.preventDefault();
  popupContact.style.display = "block";
});

boutonFermerContact.addEventListener("click", () => {
  popupContact.style.display = "none";

});

var modal = document.getElementById("menu-item-20");


/*Bouton contact page single*/

document.addEventListener("DOMContentLoaded", function() {
  const boutonContact = document.querySelector(".favorite.styled");
  const popupContact = document.getElementById("popupContact");
  const fermerPopupContact = document.getElementById("fermerPopupContact");
  const refDisplayElement = document.getElementById('photoReference'); 
  boutonContact.addEventListener("click", function() {
      const photoRefElement = document.querySelector('.single-photo-txt:nth-child(4)');
      let photoRef = "";
      if (photoRefElement) {
          photoRef = photoRefElement.textContent.split(' : ')[1].trim();
      }

      if (refDisplayElement) {
          refDisplayElement.textContent = "Référence: " + photoRef; 
      }

      popupContact.style.display = "block";
  });

  fermerPopupContact.addEventListener("click", function() {
      popupContact.style.display = "none"; 
  });
});

/*Menu Burger*/

// get Burger Icon Container
var active = document.getElementById("burger");
// add Event Listener Click to Burger Icon Container
active.addEventListener("click", function() {
  //add or remove class "active" to Burger to start animation
  this.classList.toggle("active");
  //get menu-container by id
  var menuShow = document.getElementById("menu");
  //add or remove class "show" to show or hide menu and start its animations
  menuShow.classList.toggle("show");
});

