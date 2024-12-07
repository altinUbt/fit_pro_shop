"use strict";

const btn = document.querySelector(".button");
const rememberMeCheck = document.querySelector("#rememberMe");

function saveUserData(email, password) {
  localStorage.setItem("userEmail", email);
  localStorage.setItem("userPassword", password);
}

function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function isValidPassword(password) {
  const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/;
  return passwordRegex.test(password);
}

window.addEventListener("load", function () {
  const savedEmail = localStorage.getItem("userEmail");
  const savedPassword = localStorage.getItem("userPassword");

  if (savedEmail && savedPassword) {
    document.getElementById("email").value = savedEmail;
    document.getElementById("password").value = savedPassword;
    rememberMeCheck.checked = true;
  }
});

const account = {
  email: "ah70313@gmail.com",
  password: "12345678Aa",
};

btn.addEventListener("click", function (event) {
  event.preventDefault();

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const emailError = document.getElementById("emailError");
  const passwordError = document.getElementById("passwordError");

  let isValid = true;

  if (!isValidEmail(email)) {
    emailError.textContent = "Invalid Email";
    isValid = false;
  } else {
    emailError.textContent = "";
  }

  if (!isValidPassword(password)) {
    passwordError.textContent =
      "Password must be 8+ chars, with a capital letter, lowercase, and number.";
    isValid = false;
  } else {
    passwordError.textContent = "";
  }

  if (isValid) {
    if (email === account.email && password === account.password) {
      console.log("clicked");
      window.location.href = "Homepage.html";

      if (rememberMeCheck.checked) {
        saveUserData(email, password);
      } else {
        localStorage.removeItem("userEmail");
        localStorage.removeItem("userPassword");
      }
    } else {
      alert("Email-i ose fjalëkalimi është i gabuar.");
    }
  }
});
