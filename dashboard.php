<?php
session_start();
if(!isset($_SESSION['name']))
{
    header("location:localhost");
}

if(isset($_GET['logout']))
{
    if($_GET['logout'] == 'ok')
    {
        include_once 'app/user.php';
        $obj = new user();
        $obj->logout();
    }
}
?>

<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="row">
           <p>Hi <?php echo $_SESSION['name']; ?></p>
           <p id="logout"><a href="dashboard.php?logout=ok">Logout</a></p>
        </div>

        <div class="row">
            <ul>
                <li><a href="dashboard.php?note=add">Add Note</a></li>
                <li><a href="dashboard.php?note=list">My Note</a></li>
                <li><a href="dashboard.php?note=search">Search</a></li>
            </ul>
        </div>
            <?php
            if(isset($_GET['note']))
            {
                if($_GET['note'] == 'add')
                {
                    include_once 'note/add.php';
                }
                elseif($_GET['note'] == 'list')
                {
                    include_once 'note/list.php';
                }
                elseif($_GET['note'] == 'single')
                {
                    include_once 'note/single.php';
                }
                elseif($_GET['note'] == 'search')
                {
                    include_once 'note/search.php';
                }
                elseif($_GET['note'] == 'edit')
                {
                    include_once 'note/edit.php';
                }
                elseif($_GET['note'] == 'delete')
                {
                    $id = $_GET['id'];
                    include_once 'app/note.php';
                    $obj = new note();
                    $obj->setTbl('note');
                    $obj->deleteData($id);
                    header("location:dashboard.php?note=list");
                }
            }

            ?>
    </body>
</html>