<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TMS - Accommodation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php">TMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login/Sign Up</a></li>
          <li class="nav-item"><a class="nav-link" href="package-details.html">Packages</a></li>
          <li class="nav-item"><a class="nav-link active" href="accommodation.php">Accommodation</a></li>
          <li class="nav-item"><a class="nav-link" href="booking.php">Book Package</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Accommodation Content -->
  <div class="container mt-5">
    <h2 class="text-center">Accommodation Options</h2>
    <div class="row">
      <!-- Accommodation Card -->
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img src="accom.jpg" class="card-img-top" alt="Luxury Resort">
          <div class="card-body">
            <h5 class="card-title">Luxury Resort</h5>
            <p class="card-text">Enjoy top-notch facilities and breathtaking views.</p>
            <a href="#" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>
      <!-- Add more cards as needed -->
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
