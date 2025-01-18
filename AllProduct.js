"use strict";
document.addEventListener("DOMContentLoaded", function () {
  const buyNowBtn = document.querySelectorAll(".buy-now-btn");
  const modal = document.getElementById("ProductModal");
  const modalTitle = document.getElementById("modal-title");
  const modalImage = document.getElementById("modal-image");
  const modalDescription = document.getElementById("modal-description");
  const modalPrice = document.getElementById("modal-price");
  const closeModalBtn = document.querySelector(".close");
  const buyButton = document.querySelector(".buy-button");
  const backBtn = document.querySelector(".back");

  modal.style.display = "none";

  let selectedProductId = null;

  backBtn.addEventListener("click", function () {
    window.location.href = "index.php";
  });

  buyNowBtn.forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      const productCard = e.target.closest(".product-card");
      const title = productCard.querySelector("h3").textContent;
      const image = productCard.querySelector("img").src;
      const description = productCard.querySelector(".description").textContent;
      console.log("test");
      const price = productCard
        .querySelector(".price")
        .getAttribute("data-price");

      modalTitle.textContent = title;
      modalImage.src = image;
      modalDescription.textContent = description;
      modalPrice.textContent = `${price}`;

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
  buyButton.addEventListener("click", function () {
    console.log("clicked");

    modal.style.display = "none";
  });
});
