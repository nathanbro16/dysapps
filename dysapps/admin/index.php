<?php
include '..\sql.php';


if (!$bdd)
{
	$test1 = 'ok';
}
else
{
	$test1 = 'eureur';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>espace réglage</title>
</head>
<body>

<h5>connection basse de donné:<?php echo $test1 ; ?></h5>
<a href="config-sql/index.php"><input type="button" value="Reconfigurer la basse de donner"></a>


</body>
</html>