"use strict";

const btn = document.querySelector(".button");
const rememberMeCheck = document.querySelector("#rememberMe");

// const saveData =
function saveUserData(email, password) {
  localStorage.setItem("userEmail", email);
  localStorage.setItem("userPassword", password);
}

window.addEventListener("load", function () {
  const savedEmail = localStorage.getItem("userEmail");
  const savedPassword = localStorage.getItem("userPassword");

  if (rememberMeCheck.checked) {
    document.getElementById("email").value = savedEmail;
    document.getElementById("password").value = savedPassword;
    rememberMeCheck.checked = true;
  }
  if (savedEmail && savedPassword) {
    document.getElementById("email").value = "";
    document.getElementById("password").value = "";
  }
});

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
    // window.location.href = "";

    if (rememberMeCheck.checked) {
      saveUserData(email, password);
    } else {
      localStorage.removeItem("userEmail");
      localStorage.removeItem("userPassword");
    }
  } else {
    console.log("Try again");
  }
  document.getElementById("email").value = "";
  document.getElementById("password").value = "";
});
