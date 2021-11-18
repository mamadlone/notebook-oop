<?php
include_once 'app/note.php';

if(isset($_POST['btnEdit']))
{
    $obj = new note();
    $obj->setTbl('note');
    $data = $_POST['frm'];
    $id = $data['id'];
    unset($data['id']);
    $filds = array_keys($data);
    $obj->editData($filds, $data, $id);
    header("location:dashboard.php?note=list");
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $obj = new note();
    $obj->setTbl('note');
    $res = $obj->showContact($id);
}
?>

<div class="row list">
    <h3>Edit Contact</h3>
    <form method="post">
        <label for="title">title : </label>
        <input type="text" name="frm[title]" id="title" value="<?php echo $res->title ?>"><br/>

        <textarea name="frm[text]" id="text" cols="30" rows="10"><?php echo $res->text ?></textarea>

        <input type="hidden" name="frm[id]" value="<?php echo $res->id ?>">
<input type="hidden" value="<?php echo time() ?>" name="frm[date]">
        <br>
        <button type="submit" name="btnEdit">Save Changes</button>
    </form>
</div>