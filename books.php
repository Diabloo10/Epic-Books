<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: login.html");
  exit();
}

include("connection.php");

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize search query
$searchQuery = '';
if (isset($_GET['search']) && !empty($_GET['search'])) {
  $searchQuery = $conn->real_escape_string($_GET['search']);
}

// Fetch books based on search query
$sql = "SELECT id, title, cover_image FROM books";
if (!empty($searchQuery)) {
  $sql .= " WHERE title LIKE '%$searchQuery%'";
}
$result = $conn->query($sql);

if ($result === false) {
  echo "Error: " . $conn->error; // Debugging line to show SQL error
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="icon" href="EpicBooks.png" type="image/png">

  <!-- light mode  -->
  <link rel="stylesheet" href="style.css" id="light-mode-css">
  <!-- dark mode -->
  <link rel="stylesheet" href="dark-mode.css" id="dark-mode-css" disabled>
</head>
<!-- <style>
  .gallery-grid-item {
    margin-bottom: 0.5rem;
  }

  .gallery-grid-item-wrapper {
    padding: 0;
  }

  .gallery-grid-lightbox-link img {
    width: 100%;
    display: block;
    border: 0;
  }
</style> -->
</head>

<body>
  <script src="theme-toggle.js"></script>
  <header>
    <?php include("navbar.php"); ?>
  </header>

  <main>
    <div class="container my-4">
      <input type="text" id="searchInput" class="form-control" placeholder="Search books by title...">
    </div>

    <div class="container py-4">
      <div class="row gx-4 gy-2">
        <?php
        if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $imagePath = 'uploads/' . $row['cover_image'];
            echo '
                        <div class="col-lg-3 col-md-4 col-sm-6 book-item" data-title="' . htmlspecialchars(strtolower($row['title'])) . '">
                            <figure class="gallery-grid-item">
                                <div class="gallery-grid-item-wrapper">
                                    <a href="viewBooks.php?id=' . htmlspecialchars($row['id']) . '" class="gallery-grid-lightbox-link">
                                        <img src="' . htmlspecialchars($imagePath) . '" 
                                             alt="Book Cover" 
                                             class="gallery-img img-fluid"
                                             loading="lazy"
                                             onerror="this.onerror=null;this.src=\'uploads/default-cover.jpg\';">
                                    </a>
                                </div>
                            </figure>
                        </div>';
          }
        } else {
          echo "<p>No books found.</p>";
        }
        ?>
      </div>
    </div>
  </main>

  <<footer>
    <?php include("footer.php") ?>
    </footer>

    <!-- JavaScript -->
    <script>
      document.getElementById('searchInput').addEventListener('input', function () {
        const searchQuery = this.value.toLowerCase().trim();
        const bookItems = document.querySelectorAll('.book-item');

        bookItems.forEach(item => {
          const title = item.getAttribute('data-title');
          if (title.includes(searchQuery)) {
            item.style.display = '';
          } else {
            item.style.display = 'none';
          }
        });
      });
    </script>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
   
</body>

</html>