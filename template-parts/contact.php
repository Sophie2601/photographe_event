 <!-- Dans votre menu -->
 <ul>
    <li><a href="#" id="ouvrirPopupContact">Contact</a></li>
</ul>
<div id="popupContact" class="popup-contact">
    <div class="popup-content-contact">
        <span class="fermer-contact" id="fermerPopupContact">&times;</span>
        <p id="photoReference">Référence: </p> <!-- Ajout de cet élément -->
        <?php echo do_shortcode('[contact-form-7 id="066da7f" title="Contact"]'); ?>
    </div>
</div>
