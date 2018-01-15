<?php $head='Login';?>



<html>
<head>
<meta charset="UTF-8" />
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
<title>Log In</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="login.css" />
<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<script type="text/javascript" src="login.js"></script>


</head>
<body>
<div class="container">
   
    <header>
       
        
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    
    <section>			
  
        <div id="container_demo" >
            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            
            <div id="wrapper">
                <div id="login" class="animate form">
                <? //if (isset($_GET['error'])) : ?>	
   <?require("Proseslogin.php");?>
   <?//=($_GET['error']);?>
   
<?//endif;?>
<!-- action="Proseslogin.php" -->
                    <form  autocomplete="on" method="POST" onsubmit="return validationform()" > 
                        <h1>Log in</h1> 
                        <p> 
                            <label for="username" class="uname" >  Username </label>
                            <input id="username" name="username"  type="text" placeholder="User Name" required />
                        </p>
                        <p> 
                            <label for="password" class="youpasswd"> Password </label>
                            <input id="password" name="password" type="password" placeholder="Password" required /> 
                        </p>
                       
                        <p class="signin button"> 
                            <input type="submit" name="login" value="Sign In"/> 
                        </p>
                       
                    </form>
                </div>

            
                
            </div>
        </div>  
    </section>
</div>
</body>
</html>

