/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


function verifierMotDePasse() {
    var motDePasse = document.getElementById("inputPassword").value;
    var motDePasse2 = document.getElementById("inputPassword2").value;
    var regexMajuscule = /[A-Z]/;
    var regexMinuscule = /[a-z]/;
    var regexNombre = /[0-9]/;
    var regexSpecial = /[^A-Za-z0-9]/;

    if (motDePasse.length < 8 || motDePasse2.length < 8) {
        alert("Le mot de passe doit contenir au moins 8 caractères.");
        return false;
    }

    if (!regexMajuscule.test(motDePasse) || !regexMajuscule.test(motDePasse2)) {
        alert("Le mot de passe doit contenir au moins 1 majuscule.");
        return false;
    }

    if (!regexMinuscule.test(motDePasse) || !regexMinuscule.test(motDePasse2)) {
        alert("Le mot de passe doit contenir au moins 1 minuscule.");
        return false;
    }

    if (!regexNombre.test(motDePasse) || !regexNombre.test(motDePasse2)) {
        alert("Le mot de passe doit contenir au moins 1 nombre.");
        return false;
    }

    if (!regexSpecial.test(motDePasse) || !regexSpecial.test(motDePasse2)) {
        alert("Le mot de passe doit contenir au moins 1 caractère spécial.");
        return false;
    }

    return true;
}

(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()