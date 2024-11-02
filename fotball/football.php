<?php
include 'inc/header.php';
?>
		<div class="row">
			<div class="col">

				<form method="POST">
					<h1>Player registration</h1>

					<label class="form-label">Enter player name</label><br>
					<input type="text" class="form-control" name="name">
					<label class="form-label">Enter player Number</label><br>
					<input type="number" class="form-control" name="id">
					<label class="form-label"> Enter Player team</label><br>
					<input type="text" class="form-control" name="team">
					<label class="form-label">Enter the age of the player</label><br>
					<input type="text" class="form-control" name="age">
					<label class="form-label">Enter player Birthday</label><br>
					<select class="form-select" name="select">
			<option selected="0" >08 april 1990</option> 
	        <option selected="1" >04 april 1992</option> 
	        <option selected ="2" >02 september 1993</option> 
	        <option selected ="3" >22 janaayo 1994</option>
	        <option selected ="4" >30 marso 1995</option>
	        <option selected ="5" >01 jun 1996</option>
	        <option selected ="6" >05 december 1997</option>
	        <option selected ="7" >13 marso 1998</option>
	        <option selected ="8" >20 november 1999</option>
	        <option selected ="9" >04 marso 2000</option>
	        <option selected ="10" >09 april 2001</option>
	        <option selected ="11" >07 marso 2002</option>
	        <option selected ="12" >26 jully 2003</option>
	        <option selected ="13" >25 marso 2004</option>
	        <option selected ="14" >2 marso 2005</option>
	    </select>
	    	    <label>Enter player Blood Group</label>
			<select class="form-select" name="blood">
			<option selected="">A+</option> 
	        <option selected="">B-</option> 
	        <option selected="">O+</option> 
	        <option selected="">AB+</option>
	    </select>
	    <label> Select player gender:</label><br>
	    <select class="form-select" name="Gender">
	    	<option selected="">Male</option>
	    	<option selected="">Female</option>
	    </select>
	    <label class="form-label">Enter player nationality</label>
			<select class="form-select" name="Nationality">
			<option selected="">Somalia</option> 
	        <option selected="">United state</option> 
	        <option selected="">Canada</option> 
	        <option selected="">DJ jabuuti</option>
	        <option selected="">China</option>
	        <option selected="">Sudan</option>
	        <option selected="">Kenya</option>
	        <option selected="">Ungada</option>
	        <option selected="">Ice land</option>
	    </select>
	     <label class="form-label">Enter player salarry</label>
			<select class="form-select" name="Salarry">
			<option selected="">100$</option> 
			<option selected="">200$</option> 
	        <option selected="">300$</option> 
	        <option selected="">400$</option> 
	        <option selected="">500$</option>
	        <option selected="">600$</option>
	        <option selected="">700$</option>
	        <option selected="">800$</option>
	        <option selected="">900$</option>
	        <option selected="">1000$</option>
	        <option selected="">Free</option> 
	    </select><br>
		



					<button type="submit" class="btn btn-primary">Register</button>
					
				</form>
				<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "football";

// Xir database-ka
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Haddii form-ka la submit gareeyo, xogta keydi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $team = $_POST['team'];
    $age = $_POST['age'];
    $birthday = $_POST['select'];
    $blood = $_POST['blood'];
    $gender = $_POST['Gender'];
    $nationality = $_POST['Nationality'];
    $salary = $_POST['Salarry'];

    $sql = "INSERT INTO players (player_name, player_id, team, age, birthday, blood_group, gender, nationality, salary) 
            VALUES ('$name', '$id', '$team', '$age', '$birthday', '$blood', '$gender', '$nationality', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "Player registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>



			</div>
		</div>
<?php
include 'inc/footer.php';
?>