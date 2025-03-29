<?php
session_start();
require 'db.php';

$message = '';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Handle new booking submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $package_id = $_POST['package'];
    $travel_date = $_POST['date'];

    $stmt = $pdo->prepare("INSERT INTO bookings (user_id, package_id, travel_date) VALUES (?, ?, ?)");
    if ($stmt->execute([$user_id, $package_id, $travel_date])) {
        $message = "Booking successful!";
    } else {
        $message = "Booking failed!";
    }
}

// Fetch user's bookings
$stmt = $pdo->prepare("SELECT bookings.id, packages.name AS package_name, bookings.travel_date 
                       FROM bookings 
                       JOIN packages ON bookings.package_id = packages.id 
                       WHERE bookings.user_id = ?");
$stmt->execute([$user_id]);
$bookings = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TMS - Book Package</title>
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
          <li class="nav-item"><a class="nav-link" href="accommodation.php">Accommodation</a></li>
          <li class="nav-item"><a class="nav-link active" href="booking.php">Book Package</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Booking Form -->
  <div class="container mt-5">
    <h2 class="text-center">Book Your Package</h2>
    <?php if($message): ?>
      <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form method="POST" action="booking.php">
          <div class="mb-3">
            <label for="package" class="form-label">Select Package</label>
            <select class="form-select" id="package" name="package" required>
              <option value="">Choose...</option>
              <option value="1">Exotic Getaway</option>
              <option value="2">City Break</option>
              <option value="3">Adventure Tour</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="date" class="form-label">Travel Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Confirm Booking</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- User's Bookings -->
  <div class="container mt-5">
    <h3 class="text-center">Your Bookings</h3>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Package</th>
          <th>Travel Date</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($bookings): ?>
          <?php foreach ($bookings as $booking): ?>
            <tr>
              <td><?= htmlspecialchars($booking['id']) ?></td>
              <td><?= htmlspecialchars($booking['package_name']) ?></td>
              <td><?= htmlspecialchars($booking['travel_date']) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="text-center">No bookings yet.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
