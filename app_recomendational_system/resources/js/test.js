document.querySelectorAll(".interest").forEach((item) => {
  item.addEventListener("click", () => {
    item.classList.toggle("active");
  });
});
