<?php
	echo "starting script <br />";
	$raw_data = $_REQUEST['data'];
        var_dump($raw_data);
	echo "<br />testing<br />";
	$is_valid = true;
	if (!preg_match('/^([\n]?[0-9 ]+)$/m',$raw_data)) $is_valid = false;
	$test_data = trim($raw_data);
	$test_data = preg_replace('!\s+!', ' ', $test_data);
	$test_data_array = explode(" ", $test_data);
	var_dump($test_data_array);
	$square_size = pow((int)$test_data_array[0],2);
	if (count($test_data_array) != $square_size+1) $is_valid = false;
	if ($is_valid) {
		echo "<br>valid"; 
	} else {
		echo "<br>invalid";
	}
	if ($is_valid) {
		$data = $test_data;
		$command = "mpiexec";
		$num_processes = 2;
		$executable = "/home/mpiu/mpi_dev/WitsTSPCluster/bin/tsp";
		$output = shell_exec("echo $data | $command -np $num_processes $executable");
		echo "$data was recieved <br /> sending back: $output";
	} else {
		echo "<br /><font size='5' color='red'>invalid data</font>";
	}
?>
