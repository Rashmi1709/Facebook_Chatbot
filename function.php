function insert_data($table, $data){
    $config = new Config();
    $con = $config->connect();
    $query = 'INSERT INTO `day` (`name`) VALUES ("' . $app . '")';
    if ($con->query($query)) {
        $id = mysqli_insert_id($con);
    }
    }
	