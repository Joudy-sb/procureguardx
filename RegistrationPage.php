<?php
include("connect.php");

function getData(){
    $data = array();
    $data['company_name'] = $_POST['company_name'];
    $data['license_number'] = $_POST['license_number'];
    return $data;
}

if (isset($_POST['submit'])){
    $info = getData();

    // Construct a SQL SELECT query to check if the data exists
    $select = "SELECT * FROM tbl_companydb WHERE [Company name] = '$info[company_name]' AND [License number] = '$info[license_number]'";
    
    // Execute the SELECT query
    $result = odbc_exec($connection, $select);

    // Check if any rows were returned
    if (odbc_num_rows($result) > 0) {
        // Data exists in the database
        echo "Data already exists in the database.";
    } else {
        // Data does not exist in the database
        echo "Data does not exist in the database. You can proceed to insert it if needed.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration</title>
</head>
<body>
    <h1>Register form:</h1>
    <form method ="POST">
        <table>
            <tr>
                <td>Company name:</td>
                <td><input type="text" name="company name"></td>
            </tr>
            <tr>
                <td>License number:</td>
                <td><input type="text" name="license number"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>