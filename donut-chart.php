<?php include "../connection.php";?>
<script>
	Morris.Donut({
		element: 'morris-donut-chart',
		data: [{
			label: "No Schooling completed",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where highestEducationalAttainment = 'No Schooling completed' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "Elementary",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where highestEducationalAttainment = 'Elementary' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "High School Undergrad",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where highestEducationalAttainment = 'High School Undergrad' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "High School Graduate",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where highestEducationalAttainment = 'High School Graduate' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "College Undergrad",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where highestEducationalAttainment = 'College Undergrad' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "Vocational",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where highestEducationalAttainment = 'Vocational' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "Bachelor's Degree",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where highestEducationalAttainment = 'Bachelor''s Degree' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "Master's Degree",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where highestEducationalAttainment = 'Master''s Degree' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "Doctorate Degree",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where highestEducationalAttainment = 'Doctorate Degree' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}],
		resize: true
	});


	Morris.Donut({
		element: 'morris-donut-chart01',
		data: [{
			label: "Female",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where gender = 'Female' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "Male",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where gender = 'Male' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}],
		resize: true
	});
</script>