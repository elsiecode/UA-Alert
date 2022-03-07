<?php
# Include Functions

require 'UA_Files/tasks.php';

$ua_alert_status = "Let's get things started.";

if (file_exists('../index.html')) {
  $ua_alert_status = "index.html already exists on server. You will need to rename this file or remove it before continuing.";
}   
else {
  code_website();
}

?>

<html>
<head>
<title>UA Alert</title>
<style>
body{
background-color:#1f2f45;
color:#fff;
}
h1{
color:#ffbf00;
font-size:40px;
text-align:center;
}
h2{
font-size:26px;
text-align:center;
}
p{
font-size:16px;
text-align:center;
}
</style>
</head>
<body>
<h1>UA Alert</h1>
<h2><?php echo $ua_alert_status;?></h2>
</body>
</html>