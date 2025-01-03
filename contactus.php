<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: login.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="icon" href="EpicBooks.png" type="image/png" />
  <style>
    .dropdown-menu {
      max-height: 200px;
      /* Adjust this height as needed */
      overflow-y: auto;
      /* Enable vertical scrolling */
    }
  </style>

  <!-- light mode  -->
  <link rel="stylesheet" href="style.css" id="light-mode-css">
  <!-- dark mode -->
  <link rel="stylesheet" href="dark-mode.css" id="dark-mode-css" disabled>

</head>

<body>
  <script src="theme-toggle.js"></script>

  <header>
    <!-- place navbar here -->
    <?php include("navbar.php") ?>

  </header>

  <main>
    <div class="info container my-2">
      <div class="responsive-map my-5  justify-content-center">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241317.03900799053!2d72.8804995044922!3d19.082250749999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6306644edc1%3A0x5da4ed8f8d648c69!2sMumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1732041607565!5m2!1sen!2sin"
          height="400px"
          width="100%"         
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>


    <div class="container border border-3 contact-border my-5 p-4">
      <h1 class="text-center">Leave us your info</h1>

      <form action="contact.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
          <label for="name" class="form-label my-3">Name</label>
          <input type="text" class="form-control" name="name" id="name" required />
          <small id="nameHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
          <label for="email" class="form-label my-3">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="abc@mail.com" required />
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css"
          rel="stylesheet" />


        <div class="form-group">
          <label for="country" class="form-label my-3">Country</label>
          <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Country
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#" onclick="selectCountry('+1', 'us'); event.preventDefault();">
                <span class="flag-icon flag-icon-us"></span> United States
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+44', 'gb'); event.preventDefault();">
                <span class="flag-icon flag-icon-gb"></span> United Kingdom
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+91', 'in'); event.preventDefault();">
                <span class="flag-icon flag-icon-in"></span> India
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+61', 'au'); event.preventDefault();">
                <span class="flag-icon flag-icon-au"></span> Australia
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+81', 'jp'); event.preventDefault();">
                <span class="flag-icon flag-icon-jp"></span> Japan
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+49', 'de'); event.preventDefault();">
                <span class="flag-icon flag-icon-de"></span> Germany
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+33', 'fr'); event.preventDefault();">
                <span class="flag-icon flag-icon-fr"></span> France
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+39', 'it'); event.preventDefault();">
                <span class="flag-icon flag-icon-it"></span> Italy
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+86', 'cn'); event.preventDefault();">
                <span class="flag-icon flag-icon-cn"></span> China
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+7', 'ru'); event.preventDefault();">
                <span class="flag-icon flag-icon-ru"></span> Russia
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+55', 'br'); event.preventDefault();">
                <span class="flag-icon flag-icon-br"></span> Brazil
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+27', 'za'); event.preventDefault();">
                <span class="flag-icon flag-icon-za"></span> South Africa
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+34', 'es'); event.preventDefault();">
                <span class="flag-icon flag-icon-es"></span> Spain
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+52', 'mx'); event.preventDefault();">
                <span class="flag-icon flag-icon-mx"></span> Mexico
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+64', 'nz'); event.preventDefault();">
                <span class="flag-icon flag-icon-nz"></span> New Zealand
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+65', 'sg'); event.preventDefault();">
                <span class="flag-icon flag-icon-sg"></span> Singapore
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+47', 'no'); event.preventDefault();">
                <span class="flag-icon flag-icon-no"></span> Norway
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+46', 'se'); event.preventDefault();">
                <span class="flag-icon flag-icon-se"></span> Sweden
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+90', 'tr'); event.preventDefault();">
                <span class="flag-icon flag-icon-tr"></span> Turkey
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+30', 'gr'); event.preventDefault();">
                <span class="flag-icon flag-icon-gr"></span> Greece
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+351', 'pt'); event.preventDefault();">
                <span class="flag-icon flag-icon-pt"></span> Portugal
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+41', 'ch'); event.preventDefault();">
                <span class="flag-icon flag-icon-ch"></span> Switzerland
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+48', 'pl'); event.preventDefault();">
                <span class="flag-icon flag-icon-pl"></span> Poland
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+32', 'be'); event.preventDefault();">
                <span class="flag-icon flag-icon-be"></span> Belgium
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+31', 'nl'); event.preventDefault();">
                <span class="flag-icon flag-icon-nl"></span> Netherlands
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+353', 'ie'); event.preventDefault();">
                <span class="flag-icon flag-icon-ie"></span> Ireland
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+420', 'cz'); event.preventDefault();">
                <span class="flag-icon flag-icon-cz"></span> Czech Republic
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+45', 'dk'); event.preventDefault();">
                <span class="flag-icon flag-icon-dk"></span> Denmark
              </a>

              <a class="dropdown-item" href="#" onclick="selectCountry('+63', 'ph'); event.preventDefault();">
                <span class="flag-icon flag-icon-ph"></span> Philippines
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+60', 'my'); event.preventDefault();">
                <span class="flag-icon flag-icon-my"></span> Malaysia
              </a>
              <a class="dropdown-item" href="#" onclick="selectCountry('+20', 'eg'); event.preventDefault();">
                <span class="flag-icon flag-icon-eg"></span> Egypt
              </a>
              <!-- Add more countries here in the same format -->
            </div>
          </div>
          <input type="hidden" id="countryCode" name="countryCode" value="" />
          <small id="countryHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="number" class="form-label  my-3">Number</label>
          <input type="text" class="form-control" name="number" id="number" placeholder="Phone Number" required />
          <small id="numberHelp" class="form-text text-muted"></small>
        </div>
        <div class="mb-3">
          <label for="query" class="form-label my-3">Query</label>
          <input type="text" class="form-control" name="query" id="query" placeholder="" />
          <small id="queryHelp" class="form-text text-muted"></small>
        </div>

        <button type="submit" class="btn btn-primary border-0 mx-auto my-sm-3">
          Submit
        </button>
      </form>

      <script>
        function selectCountry(code, flag) {
          document.getElementById("countryCode").value = code;
          document.getElementById("number").value = code + " ";
          document.querySelector(".dropdown-toggle").innerHTML =
            '<span class="flag-icon flag-icon-' + flag + '"></span> ' + code;
        }

        function validateForm() {
          var name = document.getElementById("name").value;
          var email = document.getElementById("email").value;
          var number = document.getElementById("number").value;

          if (name == "" || email == "" || number == "") {
            alert("All fields are required.");
            return false;
          }

          if (!/^[a-zA-Z ]+$/.test(name)) {
            alert("Name must contain only letters and spaces.");
            return false;
          }

          var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailPattern.test(email)) {
            alert("Please enter a valid email.");
            return false;
          }

          var numberPattern = /^[+\d ]+$/;
          if (!numberPattern.test(number)) {
            alert("Please enter a valid number.");
            return false;
          }

          return true;
        }
      </script>
    </div>
    <div class="info container my-5">
      <h2 class="col-12 mb-4 p-3 fs-4 text-center">Our Information</h2>
      <div class="row justify-content-center align-items-center g-0">
        <!-- Address -->
        <div class="col-12 col-md-4 mb-4 text-dark fs-4 text-center">
          <ul class="list-unstyled">
            <li class="m-3" style="list-style: none">
              <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="50px" fill="currentColor"
                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
              </svg>
            </li>
            <li class="m-3" style="list-style: none">Address</li>
            <li class="m-3" style="list-style: none">Mumbai,India</li>
          </ul>
        </div>

        <!-- Email -->
        <div class="col-12 col-md-4 mb-4 text-dark fs-4 text-center">
          <ul class="list-unstyled">
            <li class="m-3" style="list-style: none">
              <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="currentColor"
                class="bi bi-envelope" viewBox="0 0 16 16">
                <path
                  d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
              </svg>
            </li>
            <li class="m-3" style="list-style: none">Email</li>
            <li class="m-3" style="list-style: none">
              amandubeycollege@gmail.com
            </li>
          </ul>
        </div>

        <!-- Phone Number -->
        <div class="col-12 col-md-4 mb-4 text-dark fs-4 text-center">
          <ul class="list-unstyled">
            <li class="m-3" style="list-style: none">
              <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="50px" fill="currentColor"
                class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
              </svg>
            </li>
            <li class="m-3" style="list-style: none">Phone No</li>
            <li class="m-3" style="list-style: none">916-712-0872</li>
          </ul>
        </div>
      </div>
    </div>
  </main>
  <!-- place footer here -->
  <footer class="footertext-center text-lg-start text-white p-0">
    <div class="container-fluid py-2 pb-0">
      <section>
        <div class="row">
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
            <h5 class="mb-4 font-weight-bold">EpicBooks</h5>
            <p>
              <strong> EpicBooks </strong>is your go-to destination for
              discovering the latest and greatest in books. From bestselling
              novels to hidden gems, we bring you a curated selection of reads
              to inspire and entertain.
            </p>
          </div>

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-0 px-2">
            <h5 class="mb-4 font-weight-bold px-2">LINKS</h5>
            <p>
              <a href="books.php" style="text-decoration: none">Books</a>
            </p>
            <p><a href="FAQ.html" style="text-decoration: none">FAQ</a></p>
            <p>
              <a href="books.html" style="text-decoration: none">privacy</a>
            </p>
            <p><a href="books.html" style="text-decoration: none">Help</a></p>
          </div>

          <div class="col-md-4 col-lg-3 col-xl-3 mt-0 px-2">
            <h5 class="mb-4 font-weight-bold">CONTACT</h5>
            <p>Mumbai,India</p>
            <p>msaamsaa908@gmail.com</p>
            <p>+ 91 913-655-4183</p>
            <p>+ 91 916-712-0872</p>
          </div>
        </div>
      </section>

      <hr class="hr mx-3" />

      <section class="section pt-0">
        <div class="row d-flex align-items-center">
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <div class="license p-3">
              © 2024 Copyright: all right reserved by
              <a href="booksAdmin/Dashboard.php" class="no-underline" style="text-decoration: none">EpicBooks</a>
            </div>
          </div>

          <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
            <!-- Twitter -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x"
                viewBox="0 0 16 16">
                <path
                  d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
              </svg>
            </a>

            <!-- Facebook -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button">
              <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
              <svg width="30px" height="20px" style="
                    fill-rule: evenodd;
                    clip-rule: evenodd;
                    stroke-linejoin: round;
                    stroke-miterlimit: 2;
                  " version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve"
                xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                  <path
                    d="M512,256c0,-141.385 -114.615,-256 -256,-256c-141.385,0 -256,114.615 -256,256c0,127.777 93.616,233.685 216,252.89l0,-178.89l-65,0l0,-74l65,0l0,-56.4c0,-64.16 38.219,-99.6 96.695,-99.6c28.009,0 57.305,5 57.305,5l0,63l-32.281,0c-31.801,0 -41.719,19.733 -41.719,39.978l0,48.022l71,0l-11.35,74l-59.65,0l0,178.89c122.385,-19.205 216,-125.113 216,-252.89Z"
                    style="fill: #1877f2; fill-rule: nonzero" />
                  <path
                    d="M355.65,330l11.35,-74l-71,0l0,-48.022c0,-20.245 9.917,-39.978 41.719,-39.978l32.281,0l0,-63c0,0 -29.297,-5 -57.305,-5c-58.476,0 -96.695,35.44 -96.695,99.6l0,56.4l-65,0l0,74l65,0l0,178.89c13.033,2.045 26.392,3.11 40,3.11c13.608,0 26.966,-1.065 40,-3.11l0,-178.89l59.65,0Z"
                    style="fill: #fff; fill-rule: nonzero" />
                </g>
              </svg>
            </a>

            <!-- Google -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button">
              <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
              <svg width="30px" height="20px" enable-background="new 0 0 128 128" id="Social_Icons" version="1.1"
                viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="_x31__stroke">
                  <g id="Google">
                    <rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="128" width="128" />
                    <path clip-rule="evenodd"
                      d="M27.585,64c0-4.157,0.69-8.143,1.923-11.881L7.938,35.648    C3.734,44.183,1.366,53.801,1.366,64c0,10.191,2.366,19.802,6.563,28.332l21.558-16.503C28.266,72.108,27.585,68.137,27.585,64"
                      fill="#FBBC05" fill-rule="evenodd" />
                    <path clip-rule="evenodd"
                      d="M65.457,26.182c9.031,0,17.188,3.2,23.597,8.436L107.698,16    C96.337,6.109,81.771,0,65.457,0C40.129,0,18.361,14.484,7.938,35.648l21.569,16.471C34.477,37.033,48.644,26.182,65.457,26.182"
                      fill="#EA4335" fill-rule="evenodd" />
                    <path clip-rule="evenodd"
                      d="M65.457,101.818c-16.812,0-30.979-10.851-35.949-25.937    L7.938,92.349C18.361,113.516,40.129,128,65.457,128c15.632,0,30.557-5.551,41.758-15.951L86.741,96.221    C80.964,99.86,73.689,101.818,65.457,101.818"
                      fill="#34A853" fill-rule="evenodd" />
                    <path clip-rule="evenodd"
                      d="M126.634,64c0-3.782-0.583-7.855-1.457-11.636H65.457v24.727    h34.376c-1.719,8.431-6.397,14.912-13.092,19.13l20.474,15.828C118.981,101.129,126.634,84.861,126.634,64"
                      fill="#4285F4" fill-rule="evenodd" />
                  </g>
                </g>
              </svg>
            </a>

            <!-- Instagram -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button" href="">
              <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
              <svg width="30px" height="20px" enable-background="new 0 0 128 128" id="Social_Icons" version="1.1"
                viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="_x37__stroke">
                  <g id="Instagram_1_">
                    <rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="128" width="128" />
                    <radialGradient cx="19.1111" cy="128.4444" gradientUnits="userSpaceOnUse" id="Instagram_2_"
                      r="163.5519">
                      <stop offset="0" style="stop-color: #ffb140" />
                      <stop offset="0.2559" style="stop-color: #ff5445" />
                      <stop offset="0.599" style="stop-color: #fc2b82" />
                      <stop offset="1" style="stop-color: #8e40b7" />
                    </radialGradient>
                    <path clip-rule="evenodd"
                      d="M105.843,29.837    c0,4.242-3.439,7.68-7.68,7.68c-4.241,0-7.68-3.438-7.68-7.68c0-4.242,3.439-7.68,7.68-7.68    C102.405,22.157,105.843,25.595,105.843,29.837z M64,85.333c-11.782,0-21.333-9.551-21.333-21.333    c0-11.782,9.551-21.333,21.333-21.333c11.782,0,21.333,9.551,21.333,21.333C85.333,75.782,75.782,85.333,64,85.333z M64,31.135    c-18.151,0-32.865,14.714-32.865,32.865c0,18.151,14.714,32.865,32.865,32.865c18.151,0,32.865-14.714,32.865-32.865    C96.865,45.849,82.151,31.135,64,31.135z M64,11.532c17.089,0,19.113,0.065,25.861,0.373c6.24,0.285,9.629,1.327,11.884,2.204    c2.987,1.161,5.119,2.548,7.359,4.788c2.24,2.239,3.627,4.371,4.788,7.359c0.876,2.255,1.919,5.644,2.204,11.884    c0.308,6.749,0.373,8.773,0.373,25.862c0,17.089-0.065,19.113-0.373,25.861c-0.285,6.24-1.327,9.629-2.204,11.884    c-1.161,2.987-2.548,5.119-4.788,7.359c-2.239,2.24-4.371,3.627-7.359,4.788c-2.255,0.876-5.644,1.919-11.884,2.204    c-6.748,0.308-8.772,0.373-25.861,0.373c-17.09,0-19.114-0.065-25.862-0.373c-6.24-0.285-9.629-1.327-11.884-2.204    c-2.987-1.161-5.119-2.548-7.359-4.788c-2.239-2.239-3.627-4.371-4.788-7.359c-0.876-2.255-1.919-5.644-2.204-11.884    c-0.308-6.749-0.373-8.773-0.373-25.861c0-17.089,0.065-19.113,0.373-25.862c0.285-6.24,1.327-9.629,2.204-11.884    c1.161-2.987,2.548-5.119,4.788-7.359c2.239-2.24,4.371-3.627,7.359-4.788c2.255-0.876,5.644-1.919,11.884-2.204    C44.887,11.597,46.911,11.532,64,11.532z M64,0C46.619,0,44.439,0.074,37.613,0.385C30.801,0.696,26.148,1.778,22.078,3.36    c-4.209,1.635-7.778,3.824-11.336,7.382C7.184,14.3,4.995,17.869,3.36,22.078c-1.582,4.071-2.664,8.723-2.975,15.535    C0.074,44.439,0,46.619,0,64c0,17.381,0.074,19.561,0.385,26.387c0.311,6.812,1.393,11.464,2.975,15.535    c1.635,4.209,3.824,7.778,7.382,11.336c3.558,3.558,7.127,5.746,11.336,7.382c4.071,1.582,8.723,2.664,15.535,2.975    C44.439,127.926,46.619,128,64,128c17.381,0,19.561-0.074,26.387-0.385c6.812-0.311,11.464-1.393,15.535-2.975    c4.209-1.636,7.778-3.824,11.336-7.382c3.558-3.558,5.746-7.127,7.382-11.336c1.582-4.071,2.664-8.723,2.975-15.535    C127.926,83.561,128,81.381,128,64c0-17.381-0.074-19.561-0.385-26.387c-0.311-6.812-1.393-11.464-2.975-15.535    c-1.636-4.209-3.824-7.778-7.382-11.336c-3.558-3.558-7.127-5.746-11.336-7.382c-4.071-1.582-8.723-2.664-15.535-2.975    C83.561,0.074,81.381,0,64,0z"
                      fill="url(#Instagram_2_)" fill-rule="evenodd" id="Instagram" />
                  </g>
                </g>
              </svg>
            </a>
          </div>
        </div>
      </section>
    </div>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>