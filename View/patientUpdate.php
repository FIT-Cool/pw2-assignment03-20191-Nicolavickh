<?php
$med = filter_input(INPUT_GET, 'id');
if (isset($med)) {
    $patient = getPatient($med);
}

$submited = filter_input(INPUT_POST, 'btnUpdate');
if (isset($submited)) {
    $cit = filter_input(INPUT_POST, 'txtCitID');
    $name = filter_input(INPUT_POST,'txtName');
    $add = filter_input(INPUT_POST,'txtAdd');
    $place = filter_input(INPUT_POST,'txtBirthPlace');
    $date = filter_input(INPUT_POST,'dateBday');
    $phone = filter_input(INPUT_POST,'txtPhone');
    $id = filter_input(INPUT_POST,'insuranceType');
    updatePatient($med, $cit, $name, $add, $place, $date, $phone, $id);
    header("location:index.php?menu=pt");
}

?>


<Form action="" method="post">
    <fieldset>
        <legend>Update Patient</legend>
        <label>Citizenship ID Number :</label>
        <input type="text" value="<?php echo $patient['citizen_id_number']; ?>" name="txtCitID"><br/>
        <label>Full Name :</label>
        <input type="text" value="<?php echo $patient['name']; ?>" name="txtName"><br/>
        <label>Address :</label>
        <input type="text" value="<?php echo $patient['address']; ?>" name="txtAdd"><br/>
        <label>Birth Place :</label>
        <input type="text" value="<?php echo $patient['birth_place']; ?>" name="txtBirthPlace"><br/>
        <label>Birth Date :</label>
        <input type="date" value="<?php echo $patient['birth_date']; ?>" name="dateBday"><br/>
        <label>Phone Number :</label>
        <input type="text" value="<?php echo $patient['phone_number']; ?>" name="txtPhone"><br/>
        <label>Insurance Type :</label>
        <select name="insuranceType" value="<?php echo $patient['name_class']; ?>">
            <?php
            $dataInsurance = getAllInsurance();
            foreach ($dataInsurance as $insurance) {
                echo '<option value="' . $insurance['id'] . '">' . $insurance['name_class'] . '</option>';
            }
            ?>
        </select>
    </fieldset>
    <br/>
    <input type="submit" value="Update" name="btnUpdate">
</Form>

