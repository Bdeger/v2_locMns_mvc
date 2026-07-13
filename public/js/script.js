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
