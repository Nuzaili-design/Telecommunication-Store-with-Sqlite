<!DOCTYPE html>
<html lan="en" and dir="Itr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style1.css">
<script>

function validateForm() {
  let x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
</script>


</head>
<body>

<div class="navbar">

<img src="ogos_black.png" class="logo">
</div>

  
 

    <form name="myForm"  class="box" action="telecom.php" onsubmit="return validateForm() "  method="post">
    



    


    
    <input type="text" name="fname" placeholder="Enter username" id="username">
    <input type="text" name="" placeholder="Enter an email" id="email">
    <input type="submit" value="Shop"> 

    <h4>Developed by: Abdulaziz Alnuzaili</h4>
    
</form>
</body>
</html>
