<?php
$conn = new mysqli("localhost", "root", "", "football");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
    $player_id = $_POST['player_id'];
    $player_name = $_POST['name'];
    $team = $_POST['team'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $blood_group = $_POST['blood_group'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $salary = $_POST['salary'];

    $sql = "UPDATE players SET player_name='$player_name', team='$team', age='$age', birthday='$birthday', blood_group='$blood_group', gender='$gender', nationality='$nationality', salary='$salary' WHERE player_id='$player_id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to view_players.php after successful update
        header("Location: view_players.php");
        exit; // Important to stop script execution after redirection
    } else {
        echo "Error updating player: " . $conn->error;
    }
}

// Get the player information to fill in the form
if (isset($_GET['id'])) {
    $player_id = $_GET['id'];
    $sql = "SELECT * FROM players WHERE player_id='$player_id'";
    $result = $conn->query($sql);
    $player = $result->fetch_assoc();
} else {
    die("No player ID provided.");
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Update Player</h2>
    <form method="POST">
        <input type="hidden" name="player_id" value="<?php echo $player['player_id']; ?>">
        <div class="mb-3">
            <label class="form-label">Player Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $player['player_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Team</label>
            <input type="text" class="form-control" name="team" value="<?php echo $player['team']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" class="form-control" name="age" value="<?php echo $player['age']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Birthday</label>
            <input type="date" class="form-control" name="birthday" value="<?php echo $player['birthday']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Blood Group</label>
            <input type="text" class="form-control" name="blood_group" value="<?php echo $player['blood_group']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gender</label>
            <select class="form-select" name="gender">
                <option value="Male" <?php echo ($player['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($player['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nationality</label>
            <input type="text" class="form-control" name="nationality" value="<?php echo $player['nationality']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="type" class="form-control" name="salary" value="<?php echo $player['salary']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Player</button>
    </form>
</div>
</body>
</html>
