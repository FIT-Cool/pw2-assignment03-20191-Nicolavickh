<?php
function getAllPatient()
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT p.med_record_number, p.citizen_id_number, p.name ,p.address ,p.birth_place ,p.birth_date,p.phone_number, i.name_class FROM patient p JOIN insurance i ON p.insurance_id = i.id";
    $result = $link->query($query);
    return $result;
}

function addPatient($med, $cit, $name, $add, $place, $date, $phone, $id)
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "INSERT INTO patient (med_record_number, citizen_id_number, name, address, birth_place, birth_date, phone_number, insurance_id) VALUES (?,?,?,?,?,?,?,?)";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $med, PDO::PARAM_STR);
    $statement->bindParam(2, $cit, PDO::PARAM_STR);
    $statement->bindParam(3, $name, PDO::PARAM_STR);
    $statement->bindParam(4, $add, PDO::PARAM_STR);
    $statement->bindParam(5, $place, PDO::PARAM_STR);
    $statement->bindParam(6, $date, PDO::PARAM_STR);
    $statement->bindParam(7, $phone, PDO::PARAM_STR);
    $statement->bindParam(8, $id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;

}

function deletePatient($medRec)
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "DELETE FROM patient WHERE med_record_number = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $medRec, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;

}

function updatePatient($med, $cit, $name, $add, $place, $date, $phone, $id)
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "UPDATE patient SET citizen_id_number = ?, name = ?, address = ?, birth_place = ?, birth_date = ?, phone_number = ?, insurance_id = ? WHERE med_record_number = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $cit, PDO::PARAM_STR);
    $statement->bindParam(2, $name, PDO::PARAM_STR);
    $statement->bindParam(3, $add, PDO::PARAM_STR);
    $statement->bindParam(4, $place, PDO::PARAM_STR);
    $statement->bindParam(5, $date, PDO::PARAM_STR);
    $statement->bindParam(6, $phone, PDO::PARAM_STR);
    $statement->bindParam(7, $id, PDO::PARAM_INT);
    $statement->bindParam(8, $med, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;

}

function getPatient($medRec)
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM patient WHERE med_record_number = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $medRec, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch();
    $link = null;
    return $result;
}

?>