document.addEventListener("DOMContentLoaded", () => {
  const sections = document.querySelectorAll(".summary-text");
  const links = document.querySelectorAll(".summary-link");

  function onScroll() {
    let scrollPos = window.scrollY + 100; // ajuste do offset

    sections.forEach((section) => {
      if (
        scrollPos >= section.offsetTop &&
        scrollPos < section.offsetTop + section.offsetHeight
      ) {
        links.forEach((link) => {
          link.classList.remove("active");
          if (link.getAttribute("href") === "#" + section.id) {
            link.classList.add("active");
          }
        });
      }
    });
  }

  window.addEventListener("scroll", onScroll);
  onScroll(); // rodar no load também
});
