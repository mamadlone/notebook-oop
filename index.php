<?php
include_once 'app/user.php';
session_start();
if(isset($_POST['btnLogin']))
{
    $data = $_POST['frm'];
    $obj = new user();
    $obj->login($data);
}

?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="mid">
<div>

<form action="" method="post">


<label for="">Email:</label><br/>
    <input type="text" name="frm[email]" >
    
    <br/><label for="">Password:</label><br/>
    <input type="password" name="frm[password]">
    <br/><br/>
    <button name="btnLogin" type="submit">Login</button>

</form>

<?php
if(isset($_GET['login']))
{
    if($_GET['login'] == 'no')
    {
        echo 'not exist this user.';
    }

}
?>
</div>
</div>

</body>

</html>