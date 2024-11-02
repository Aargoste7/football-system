<?php
$conn = new mysqli("localhost", "root", "", "football");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $player_id = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM players WHERE player_id='$player_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Player deleted successfully.";
    } else {
        echo "Error deleting player: " . $conn->error;
    }
} else {
    die("No player ID provided.");
}

$conn->close();

// Redirect back to the player list
header("Location: view_players.php");
exit();
?>
