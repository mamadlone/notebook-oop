<?php

if(isset($_GET['id']))
{
    include_once 'app/note.php';
    $id = $_GET['id'];
    $obj = new note();
    $obj->setTbl('note');
    $res = $obj->searchNote('id',$id);

    ?>


<ul class="single">
    <li><p class="singleT"><a href="dashboard.php?note=list">list of note</a></p></li>
<li class="header">
    <h1>
    <?php echo $res->title ?>
    </h1>
    <p>
    <?php echo date('Y/m/d  -  H:i',$res->date) ?>
    </p>
</li>


<li>


<a href="dashboard.php?note=edit&id=<?php echo $res->id ?>">Edit</a> , 
<a href="dashboard.php?note=delete&id=<?php echo $res->id ?>">Delete</a>
</li>

<li>
    <p class="singleT">
    <?php echo $res->text ?>
    </p>
</li>

</ul>
<?php
}

?>


