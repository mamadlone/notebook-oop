<?php
if(isset($_POST['btnSend']))
{
    $data = $_POST['frm'];
    include_once 'app/note.php';
    $obj = new note();
    $obj->sendNote($data);
    header("location: dashboard.php?note=list");
}


?>

<div class="row">

<form action="" method="post">
    <label for="">Title: </label><br/>
<input type="text" name="frm[title]"><br/>

<textarea  name="frm[text]" placeholder="Your Note..."></textarea>

<input type="hidden" value="<?php echo time() ?>" name="frm[date]">
<input type="hidden" value="<?php echo $_SESSION['name'] ?>" name="frm[auther]">

    
<br><button name="btnSend" type="submit">Save</button>

</form>

</div>