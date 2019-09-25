function deleteInsurance(id) {
    var conf = window.confirm("Are you sure ?");
    if (conf) {
        window.location = "index.php?menu=in&delCom=1&id=" + id;
    }
}

function updateInsurance(id) {
    window.location = "index.php?menu=InUpdt&id=" + id;
}

