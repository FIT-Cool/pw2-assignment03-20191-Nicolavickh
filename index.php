<?php
include_once 'Database/patientFunction.php';
include_once 'Database/insuranceFunction.php';
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="datatables.min.css">
    <script type="text/javascript" src="datatables.min.js"></script>
    <title>DATABASE RUMAH SAKIT</title>
    <meta name="author" content="Nicolavickh Yohanes - 1772016">
    <script SRC="insuranceScript.js"></script>
    <script SRC="patientScript.js"></script>


</head>
<body>
<div class="page">
    <header>
        <h1>Rumah Sakit</h1>
    </header>
    <nav>
        <ul>
            <li><a href="?menu=pt">Patient Table</a></li>
            <li><a href="?menu=in">Insurance Table</a></li>
        </ul>
    </nav>
    <main>
        <?php
        $targetMenu = filter_input(INPUT_GET, 'menu');
        switch ($targetMenu) {
            case 'pt':
                include_once 'View/patient.php';
                break;
            case 'in':
                include_once 'View/insurance.php';
                break;
            case 'InUpdt':
                include_once 'view/insuranceUpdate.php';
                break;
            case 'PtUpdt':
                include_once 'view/patientUpdate.php';
                break;
            default :
                include_once 'view/home.php';
        }
        ?>
    </main>
</div>
</body>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    })
</script>
</html>