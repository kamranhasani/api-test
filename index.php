<?php
session_start();
	 $apitoken = base64_encode( openssl_random_pseudo_bytes(32));
$_SESSION['token']=$apitoken;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>API-TEST by kamran</title>
<link type="text/css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
<link type="text/css" href="css/font-awesome.min.css" rel="stylesheet" />
<link type="text/css" href="css/style.css" rel="stylesheet" />

</head>
<body>
<body dir="rtl">

<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>API-TEST</h3>
</div>
            
            <div class="card-body">

            <br>
                <form    method="post"   action="helper.php" autocompelet="off">
                    <div class="input-group form-group">
                    
                        <input type="text" class="form-control"  placeholder=" Username" name="user" id="user">
                    </div>
                    
                    <div class="input-group form-group">
                        
                        <input type="email" class="form-control"  placeholder="Email " name="email" id="email">
                    </div>

                    <div class="input-group form-group">		
                        <input type="hidden" class="form-control"   name="token" id="token" value="<?php echo  $apitoken; ?>"/>
                    </div>
                    
                    <div class="input-group form-group">	
                    <select name="role" class="form-control">
                            <option> Function</option>
                            <option value="1"> insert</option>
                            <option value="2" >show</option>
                            <option value="3" >update user </option>
                            <option value="4" >delete</option>
                            </select>

                     </div>
                    <div class="form-group">
                        <input type="submit" value="Send" class="btn float-right login_btn" name="api" id="api">
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
                <script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>