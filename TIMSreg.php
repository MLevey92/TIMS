/*employee registration page... Still needs an upload picture field
Assuming supervisors do not register here, rather have their database info inserted manually
Still trying to echo query e_id upon registration
*/

<?php
	ini_set('error_reporting', 1);
	require './includes/header.php';
	require_once '../mysqli_config.php';  //$dbc is the connection string set upon successful connection
		$missing = array();	
		if(isset($_POST['submit'])) {
			if (!empty($_POST['first']))
				$first = $_POST['first'];
			else
				$missing[]= "first";
		
			if (!empty($_POST['last']))
				$last = $_POST['last'];
			else
				$missing['last'] = "Last name is missing<br>";
			
			if (!empty($_POST['division']))
				$division = $_POST['division'];
			else
				$missing[] = "Division is missing<br>";
				
			if (!empty($_POST['shift']))
				$shift = $_POST['shift'];
			else
				$missing[] = "Division is missing<br>";
			
			if (!empty($_POST['pwd']))
				$pwd = $_POST['pwd'];
			else
				$missing[] = "password";		
			
			if (!empty($_POST['conf']))
				$conf = $_POST['conf'];
			else
				$missing[] = "confirmation";	
			
			if ($pwd != $conf) {
				$missing[] = "mismatched";
				$message = "The passwords don't match<br>";
			}
			if (empty($missing)){
				require_once '../mysqli_config.php';  //$dbc is the connection string set upon successful connection
				echo "<main>";
				$fullname = $first . ' ' . $last;
				$query = "INSERT into employee(e_name, div_name, shift, password) VALUES ('$fullname', '$division', '$shift', '$pwd')";
				$result = mysqli_query($dbc, $query);
				if($result) { //It worked
					echo "Thanks for registering $first $last<br>";
					
					/*echo e_id for employee upon registration */ 
					$r = mysqli_query($dbc, "select e_id from employee where e_name = $fullname");
					$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
					echo ("%s (%s)\n",$row["e_id"]);
					
				}
				else echo "We're sorry, we were not able to add you at this time.<br>";
				echo "</main>";
				include 'includes/footer.php';
				exit;
			}
			
	}
	?>
	<main>
	<form method = "post" action="TIMSreg.php">  
	<!-- the get method would not normally be used for site registration -->
	<!-- it is used here to help find the problems with the form -->
		<fieldset>
			<?php if ($missing)
				echo "There were some problems. Please try again:<br>";
			?>
			<legend>EMPLOYEE REGISTRATION</legend>
			<label>
				First Name:  
				<input type="text" name="first" <?php if(isset($first)) echo " value=\"$first\"";?>>
			</label> 
			<br>
			<label>
				Last Name: 
				<input type="text" name="last" <?php if (isset($last)) echo " value=\"$last\"";?>>
			</label>
			<br>
			<label>
				Division: 
				<input type = "text" name="division" <?php if (isset($division)) echo " value=\"$division\"";?>> 
			</label>
			<br>
			<label>
				Shift: 
				<input type = "text" name="shift" <?php if (isset($shift)) echo " value=\"$shift\"";?>> 
			</label>
			<br>
			<!-- Inform the user if the passwords don't match but never make them sticky -->
			<?php if(isset($message)) echo "$message<br>"; ?>
			<label>
				Password:
				<input type = "password" name="pwd"> 
			</label>
			<br>
			<label>
				Confirm Password: 
				<input type = "password" name = "conf">
			</label>
		</fieldset>
			<br>
			<input type = submit value = "Register" name="submit">
	</form>
	</main>
<?php include 'includes/footer.php'; ?>

