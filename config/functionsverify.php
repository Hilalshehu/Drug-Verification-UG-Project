<?php

    //Clean String Values
    function clean($string) {
        return htmlentities($string);
    }

    //Validate if present and return the table
    function validate() {
        if(isset($_POST['validate'])) {
        $drug_number = clean($_POST['drug_no']);

        $sql = "SELECT * FROM drugs WHERE drug_number='".$drug_number."'";
        $query = Query($sql);
        confirm($query);
        $result = fetch_data($query);

        if(count_rows($query) == 1) {
            echo '
            <div class="table-title">
    <center><h3>Drug number is valid</h3></center>
    </div>
    <table class="table-fill">
    <thead>
    </thead>
    <tbody class="table-hover">
    <tr>
    <td class="text-left">Name</td>
    <td class="text-left">'.$result['drug_name'] . '</td>
    </tr>
    <tr>
    <td class="text-left">Drug Number</td>
    <td class="text-left">'.$result['drug_number'].'</td>
    </tr>
    <tr>
    <td class="text-left">Manufacturer</td>
    <td class="text-left">'.$result['manufacturer'].'</td>
    </tr>
    <tr>
    <td class="text-left">Status</td>
    <td class="text-left">'.$result['status'].'</td>
    </tr>
    <tr>
    <td class="text-left">Date of Registration</td>
    <td class="text-left">'.$result['created_at'].'</td>
    </tr>
    </tbody>
    </table>

            
            ';
        } else {
            echo '<div class="table-title-red">
            <center><h3>Drug number is invalid</h3></center>
            </div>';
        }

    }
}

?>