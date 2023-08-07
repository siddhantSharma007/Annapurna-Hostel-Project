<?php
require "connection.php";

$sql = "SELECT * FROM `student-details`"; 
$total = 60;
$result = mysqli_query($con, $sql);
$res1 = mysqli_num_rows($result);
$remaining = $total - $res1;

// Calculate total payment
$totalPayment = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $totalPayment += $row['amount'];
}

mysqli_data_seek($result, 0); // Reset the result set pointer back to the beginning

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admiin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: url(https://d2lwtouoc9qh9n.cloudfront.net/wp-content/uploads/2023/01/wordpress-basics-featured-image-jpg.webp)">
    <nav class="navbar navbar-expand-lg navbar-light" id="nav1" style="background-color:black ;">
        <div class="container-fluid" style="border: 2px solid white;">
          <a class="navbar-brand" href="#"><img src="./Images/logo.png" alt="Annapurna" style="width: 100px;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.html" style="color: white;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" style="color: white;">Services</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="./owner.html" style="color: white;">Owner Desk</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./Contact.html" style="color: white;">Contact us</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <h1 style="text-align: center; color:white;">Welcome To Admin Panel</h1>
    <div class="container">
        <div class="row"> 
            <div class="col-md-6 ml-5 mt-5"> 
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">No of students</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $res1; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5"> 
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total Payment</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $totalPayment; ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-6 mt-4 ml-5"> 
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Room Occupied</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo ($res1); ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4"> 
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Room Remaining</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $remaining; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h3 style="text-align:center; margin-top:40px; color:white">Students Details</h3>
    </div>

    <?php
    if ($res1 > 0) {
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Student Name</th>";
        echo "<th>Room No</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['room'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo '<h3 style="text-align: center; color:white;">No students found</h3>';
    }
    mysqli_close($con);
    ?>
</body>
</html>
