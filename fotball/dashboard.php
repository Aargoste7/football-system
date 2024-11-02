
		<?php
include 'inc/header.php';

// Xir database
$conn = new mysqli("localhost", "root", "", "football");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Soo akhri tirada ciyaartoyda iyo lacagta guud ee kooxda
$sql = "SELECT COUNT(*) as player_count, SUM(salary) as total_salary FROM players";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$player_count = $data['player_count'];
$total_salary = $data['total_salary'];

$conn->close();
?>

<div class="row">
    <!-- Tirada Ciyaartoyda -->
    <div class="col-md-6 mb-4">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="card-title">Total Players</h4>
                <p class="card-text display-4"><?php echo $player_count; ?></p>
            </div>
        </div>
    </div>

    <!-- Lacagta Guud ee Kooxda -->
    <div class="col-md-6 mb-4">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="card-title">Total Salary</h4>
                <p class="card-text display-4"><?php echo "$" . number_format($total_salary); ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Sawiro iyo Logos -->
<div class="row mt-4">
    <div class="col-md-4">
        <img src="images/images2.jpeg" class="img-fluid rounded mb-3" alt="Player 1">
    </div>
    <div class="col-md-4">
        <img src="images/image1.jpg" class="img-fluid rounded mb-3" alt="Stadium">
    </div>
    <div class="col-md-4">
        <img src="images/images3.jpeg" class="img-fluid rounded mb-3" alt="Team Logo">
    </div>



	</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
<?php
include 'inc/footer.php';
?>
