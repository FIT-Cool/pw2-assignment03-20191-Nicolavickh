<?php
$deleteCommand = filter_input(INPUT_GET, 'delCom');
if (isset($deleteCommand) && $deleteCommand == 1) {
    $id = filter_input(INPUT_GET, 'id');
    deleteInsurance($id);
}

$add = filter_input(INPUT_POST, 'btnAdd');
if (isset($add)) {
    $id = filter_input(INPUT_POST, 'txtID');
    $type = filter_input(INPUT_POST, 'txtType');
    addInsurance($id, $type);
}
?>

<form action="" method="post">
    <fieldset>
        <legend>Add Insurance</legend>
        <label>ID :</label>
        <input type="text" placeholder="1" name="txtID"><br/>
        <label>Insurance Type : </label>
        <input type="text" placeholder="Tanpa Asuransi" name="txtType"><br/>
    </fieldset>
    <br/>
    <button type="submit" value="Add Insurance" name="btnAdd">Add Insurance</button>

</form>
<table id="myTable">
    <thead>
    <tr>
        <td>ID</td>
        <td>Insurance Type</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <br/>
    <?php
    $data = getAllInsurance();
    foreach ($data as $insurances) {
        echo '<tr>';
        echo '<td>' . $insurances['id'] . '</td>';
        echo '<td>' . $insurances['name_class'] . '</td>';
        echo '<td><button onclick="deleteInsurance(' . $insurances['id'] . ')">Delete</button><button onclick="updateInsurance(' . $insurances['id'] . ')">Update</button> </td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
