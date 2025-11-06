document.addEventListener("DOMContentLoaded", function () {
  const popup = document.getElementById("product-popup");
  const popupImg = document.getElementById("popup-img");
  const popupTitle = document.getElementById("popup-title");
  const popupDesc = document.getElementById("popup-desc");
  const popupWhats = document.getElementById("popup-whats");
  const overlay = popup.querySelector(".popup-overlay");
  const closeBtn = popup.querySelector(".close-popup");

  document.querySelectorAll(".product-card").forEach((card) => {
    card.addEventListener("click", function () {
      const title = card.dataset.title;
      const desc = card.dataset.desc;
      const img = card.dataset.img;

      popupImg.src = img;
      popupTitle.textContent = title;
      popupDesc.innerHTML = desc;

      const msg = encodeURIComponent(
        `Olá! Gostaria de solicitar um orçamento do produto "${title}".`
      );
      popupWhats.href = `https://wa.me/554888660366?text=${msg}`;

      popup.setAttribute("aria-hidden", "false");
      document.body.classList.add("popup-open");
    });

    card.addEventListener("keypress", function (e) {
      if (e.key === "Enter") card.click();
    });
  });

  [overlay, closeBtn].forEach((el) =>
    el.addEventListener("click", () => {
      popup.setAttribute("aria-hidden", "true");
      document.body.classList.remove("popup-open");
    })
  );
});
