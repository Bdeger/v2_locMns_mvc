// menu burger

document.getElementById("nav").classList.add("nav-hide");
// faire apparaitre ou disparaitre le menu

document
  .getElementById("burger-button-display")
  .addEventListener("click", () => {
    if (!document.getElementById("nav").classList.toggle("nav-hide")) {
      document.querySelector("#nav-ul > li:first-child a").focus();
    }
  });


// validation des dates page catégorie


const formPeriode = document.querySelector('.periode-form');
const debut = document.getElementById('date_debut');
const fin = document.getElementById('date_fin');
const messageDate = document.getElementById('message-date');

if (formPeriode && debut && fin && messageDate) {

    function verifierDates() {
        if (debut.value && fin.value && fin.value < debut.value) {
            messageDate.textContent = "La date de fin doit être après la date de début.";
            messageDate.style.display = "block";
            return false;
        }
        messageDate.style.display = "none";
        return true;
    }

    debut.addEventListener('change', verifierDates);
    fin.addEventListener('change', verifierDates);

    formPeriode.addEventListener('submit', function(e) {
        if (!verifierDates()) {
            e.preventDefault();
        }
    });
}