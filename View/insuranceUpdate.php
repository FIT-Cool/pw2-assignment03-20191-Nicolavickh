<?php
$id = filter_input(INPUT_GET, 'id');
if (isset($id)) {
    $insurance = getInsurance($id);
}

$submited = filter_input(INPUT_POST, 'btnUpdate');
if (isset($submited)) {
    $name = filter_input(INPUT_POST, 'txtName');
    updateInsurance($id, $name);
    header("location:index.php?menu=in");
}

?>

<fieldset>
<legend>Update Insurance</legend>
<Form action="" method="post">
    <label>Nama Insurance : </label>
    <input type="text" value="<?php echo $insurance['name_class']; ?>" name="txtName">
    <br/>
    <button type="submit" value="Update" name="btnUpdate">Update</button>
</Form>
</fieldset>

