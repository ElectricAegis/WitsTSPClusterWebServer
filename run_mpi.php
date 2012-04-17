<?php
	$data = $_REQUEST['data'];
//	$output = shell_exec("mpiexec -np $data /home/mpiu/mpi_dev/mpi_test/environment/a.out");
	$output = shell_exec("whoami");
	echo "$data was recieved <br /> sending back: $output";
?>
