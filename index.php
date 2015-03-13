<?php

require_once 'settings.php';

#remove the directory path we don't want
$request = str_replace('/mockupper/', '', $_SERVER['REQUEST_URI']);

#split the path by '/'
$params = split( '/', $request );

echo $_SERVER['REQUEST_URI'].'<br>';
print_r($params);

$family = $params[0];
$subfamily = '';
if ( strpos( $family, '-' ) !== FALSE ) {
	$newfamily = split( '-', $family );
	$family    = $newfamily[0];
	$subfamily = $newfamily[1];
}
$aggregator = $params[1];

aggregator( $family, $subfamily, $aggregator );
  
?>


<br><br>
family <?= $family ?><br>
subfamily <?= $subfamily ?><br>
aggregator <?= $aggregator ?><br>
<html>
<head>
</head>

<body>
	
Log in form

<form action="login.php" method="post">
	<input type="text"     name="email"><br />
	<input type="password" name="password">
	<br />
	<input type="submit" value="Submit">
</form>

</body>
</html>
