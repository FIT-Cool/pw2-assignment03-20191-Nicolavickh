function deletePatient(id) {
    var conf = window.confirm("Are you sure ?");
    if (conf) {
        window.location = "index.php?menu=pt&delCom=1&id=" + id;
    }
}

function updatePatient(id) {
    window.location = "index.php?menu=PtUpdt&id=" + id;
}

