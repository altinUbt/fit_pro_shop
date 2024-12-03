"use strict";

const buyNowBtn = document.querySelectorAll(".buy-now-btn");
const modal = document.getElementById("ProductModal");
const modalTitle = document.getElementById("modal-title");
const modalImage = document.getElementById("modal-image");
const modalDescription = document.getElementById("modal-description");
const closeModalBtn = document.querySelector(".close");
const buyButton = document.querySelector(".buyButton");

buyNowBtn.forEach(function (btn) {
  console.log(btn);
  btn.addEventListener("click", function (e) {
    const productCard = e.target.closest(".product-card");
    const title = productCard.querySelector("h3").textContent;
    const image = productCard.querySelector("img").src;
    const description = productCard.querySelector(".description").textContent;

    modalTitle.textContent = title;
    modalImage.src = image;
    modalDescription.textContent = description;

    modal.style.display = "flex";
  });
});
closeModalBtn.addEventListener("click", function () {
  modal.style.display = "none";
});
window.addEventListener("click", function (e) {
  if (e.target === modal) {
    modal.style.display = "none";
  }
});
// buyButton.addEventListener("click", function () {
//   console.log("clicked");
// });
