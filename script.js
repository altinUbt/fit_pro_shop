"use strict";

const btn = document.querySelector(".button");

const account = {
  email: "ah70313@gmail.com",
  password: "12345678",
};

btn.addEventListener("click", function (event) {
  event.preventDefault();
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  if (
    email === account.email &&
    password === account.password &&
    password.length >= 8
  ) {
    console.log("clicked");
    window.location.href = "login.html";
  } else {
    console.log("Try again");
  }
});
