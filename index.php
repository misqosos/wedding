<?php
  function isMobileDevice() { 
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
  |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i" 
  , $_SERVER["HTTP_USER_AGENT"]); 
  } 

  if(isMobileDevice()){
    header('Location: /m/');
    exit;
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Stakčínska svadbička</title>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="heart.ico">
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php
		include("app.component.php");
	?>
</body>
</html>