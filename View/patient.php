<?php
$deleteCommand = filter_input(INPUT_GET, 'delCom');
if (isset($deleteCommand) && $deleteCommand == 1) {
    $id = filter_input(INPUT_GET, 'id');
    deletePatient($id);
}

$add = filter_input(INPUT_POST, 'buttonAdd');
if (isset($add)) {
    $medRec = filter_input(INPUT_POST, 'txtMedRec');
    $citID = filter_input(INPUT_POST, 'txtCitID');
    $name = filter_input(INPUT_POST, 'txtName');
    $address = filter_input(INPUT_POST, 'txtAdd');
    $bPlace = filter_input(INPUT_POST, 'txtBirthPlace');
    $bDay = filter_input(INPUT_POST, 'dateBday');
    $phone = filter_input(INPUT_POST, 'txtPhone');
    $insuranceType = filter_input(INPUT_POST, 'insuranceType');
    addPatient($medRec, $citID, $name, $address, $bPlace, $bDay, $phone, $insuranceType);
}
?>

<form action="" method="post">
    <fieldset>
        <legend>Add Patient</legend>
        <label>Medical Record Number :</label>
        <input type="text" placeholder="A-0000001" name="txtMedRec"><br/>
        <label>Citizenship ID Number :</label>
        <input type="text" placeholder="1234567890123" name="txtCitID"><br/>
        <label>Full Name :</label>
        <input type="text" placeholder="Nicolavickh Yohanes" name="txtName"><br/>
        <label>Address :</label>
        <input type="text" placeholder="Surya Sumantri 1" name="txtAdd"><br/>
        <label>Birth Place :</label>
        <input type="text" placeholder="Bandung" name="txtBirthPlace"><br/>
        <label>Birth Date :</label>
        <input type="date" name="dateBday"><br/>
        <label>Phone Number :</label>
        <input type="text" placeholder="025704552552" name="txtPhone"><br/>
        <label>Insurance Type :</label>
        <select name="insuranceType">
            <?php
            $dataInsurance = getAllInsurance();
            foreach ($dataInsurance as $insurance) {
                echo '<option value="' . $insurance['id'] . '">' . $insurance['name_class'] . '</option>';
            }
            ?>
        </select>
    </fieldset>
    <br/>
    <button type="submit" value="Add Patient" name="buttonAdd">Add Patient</button>
</form>
<br/>
<table id="myTable">
    <thead>
    <tr>
        <td>Med Rec Number</td>
        <td>Citizenship Number</td>
        <td>Name</td>
        <td>Address</td>
        <td>Birth Place</td>
        <td>Birth Date</td>
        <td>Phone Number</td>
        <td>Insurance Type</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>

    <?php
    $data = getAllPatient();
    foreach ($data as $patients) {
        echo '<tr>';
        echo '<td>' . $patients['med_record_number'] . '</td>';
        echo '<td>' . $patients['citizen_id_number'] . '</td>';
        echo '<td>' . $patients['name'] . '</td>';
        echo '<td>' . $patients['address'] . '</td>';
        echo '<td>' . $patients['birth_place'] . '</td>';
        echo '<td>' . date_format(date_create($patients['birth_date']), 'd M Y') . '</td>';
        echo '<td>' . $patients['phone_number'] . '</td>';
        echo '<td>' . $patients['name_class'] . '</td>';
        echo '<td><button onclick="deletePatient(\'' . $patients['med_record_number'] . '\')">Delete</button><button onclick="updatePatient(\'' . $patients['med_record_number'] . '\')">Update</button> </td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
