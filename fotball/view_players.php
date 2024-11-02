<?php
include 'inc/header.php';
?>
<div class="row">
    <div class="col">
        <h2>Player List</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Player Number</th>
                <th>Team</th>
                <th>Age</th>
                <th>Birthday</th>
                <th>Blood Group</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>Salary</th>
                <th>Actions</th> <!-- Ku dar column cusub -->
            </tr>
            </thead>
            <tbody>
            <?php
            $conn = new mysqli("localhost", "root", "", "football");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM players";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['player_name']}</td>
                            <td>{$row['player_id']}</td>
                            <td>{$row['team']}</td>
                            <td>{$row['age']}</td>
                            <td>{$row['birthday']}</td>
                            <td>{$row['blood_group']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['nationality']}</td>
                            <td>{$row['salary']}</td>
                            <td>
                                <a href='update_player.php?id={$row['player_id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete_player.php?id={$row['player_id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this player?');\">Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No players found</td></tr>";
            }

            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</div>
<br><br><br><br><br><br><br><br>
<?php
include 'inc/footer.php';
?>
