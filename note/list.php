<?php
include_once 'app/note.php';
$obj = new note();
$obj->setTbl('note');
$result = $obj->listNote();
// var_dump($result);
?>
<div class="col">
<ul class="ul">
    <?php
    foreach($result as $key=>$val)
    {
        ?>

<li class="list">
    
<h4><a href="dashboard.php?note=single&id=<?php echo $val->id ?>"><?php echo $val->title ?></a></h4>
<p class="text"><?php echo $obj->post_content($val->text) ?></p>


<div class="footer">
<p >Date: <?php echo date('Y/m/d - H:i',$val->date) ?></p>

<p >
<a href="dashboard.php?note=edit&id=<?php echo $val->id ?>">Edit</a> , 
<a href="dashboard.php?note=delete&id=<?php echo $val->id ?>">Delete</a>

</p>
</div>


</li>

    <?php }
    ?>
</ul>