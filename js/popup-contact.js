document.addEventListener("DOMContentLoaded", function () {
  const contactPopup = document.getElementById("contact-popup");
  const contactBtn = document.querySelector(".section-contact .btn.secondary");
  const overlay = contactPopup.querySelector(".popup-overlay");
  const closeBtn = contactPopup.querySelector(".close-popup");

  if (contactBtn && contactPopup) {
    contactBtn.addEventListener("click", function (e) {
      e.preventDefault();
      contactPopup.setAttribute("aria-hidden", "false");
      document.body.classList.add("popup-open");
    });

    [overlay, closeBtn].forEach((el) =>
      el.addEventListener("click", () => {
        contactPopup.setAttribute("aria-hidden", "true");
        document.body.classList.remove("popup-open");
      })
    );
  }
});
