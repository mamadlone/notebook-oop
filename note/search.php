<?php
    include_once 'app/note.php';
    $obj = new note();
    $obj->setTbl('note');
?>

<div class="col">

    <form action="" method="post">
    <label for="">Enter your Title: </label>    
    <input type="text" name="txtSearch">
        <button type="submit" name="btnSearch">Search</button>
    </form>
<br/>

<div>

    <ul>
<?php
    if(isset($_POST['btnSearch']))
    {
        $txt = $_POST['txtSearch'];
        $result = $obj->likeData('title', $txt);
        if(count($result)>0){
                   
    foreach ($result as $value) {
?>
    <li class="list">
<h4><a href="dashboard.php?note=single&id=<?php echo $value->id ?>"><?php echo $value->title ?></a></h4>
<p class="text"><?php echo $obj->post_content($value->text) ?></p>


<div class="footer">
<p >Date: <?php echo date('Y/m/d - H:i',$value->date) ?></p>
</div>

    </li>


<?php }
}
else{
    echo 'nothings...';
}

} ?>
</ul>
</div>
