<?php
$currentYear = date("Y");
$conn = new mysqli("localhost", "root", "","bank");
if ($conn->connect_error) { 
echo $conn->connect_error;
}

$sqljan = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 1 AND YEAR(transaction_date) = '$currentYear'";
$sqlfeb = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 2 AND YEAR(transaction_date) = '$currentYear'";
$sqlmar = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 3 AND YEAR(transaction_date) = '$currentYear'";
$sqlapr = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 4 AND YEAR(transaction_date) = '$currentYear'";
$sqlmay = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 5 AND YEAR(transaction_date) = '$currentYear'";
$sqljun = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 6 AND YEAR(transaction_date) = '$currentYear'";
$sqljul = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 7 AND YEAR(transaction_date) = '$currentYear'";
$sqlaug = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 8 AND YEAR(transaction_date) = '$currentYear'";
$sqlsep = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 9 AND YEAR(transaction_date) = '$currentYear'";
$sqloct = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 10 AND YEAR(transaction_date) = '$currentYear'";
$sqlnov = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 11 AND YEAR(transaction_date) = '$currentYear'";
$sqldec = "SELECT COUNT(*) AS user_count FROM daily_transactions WHERE MONTH(transaction_date) = 12 AND YEAR(transaction_date) = '$currentYear'";

$resultjan = mysqli_query($conn, $sqljan);
$resultfeb = mysqli_query($conn, $sqlfeb);
$resultmar = mysqli_query($conn, $sqlmar);
$resultapl = mysqli_query($conn, $sqlapr);
$resultmay = mysqli_query($conn, $sqlmay);
$resultjun = mysqli_query($conn, $sqljun);
$resultjul = mysqli_query($conn, $sqljul);
$resultaug = mysqli_query($conn, $sqlaug);
$resultsep = mysqli_query($conn, $sqlsep);
$resultoct = mysqli_query($conn, $sqloct);
$resultnov = mysqli_query($conn, $sqlnov);
$resultdec = mysqli_query($conn, $sqldec);

if ($resultjan) {
    $row = mysqli_fetch_assoc($resultjan);
    $userCount = $row['user_count'];
    $label = "JAN";
    $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount' WHERE `label`= '$label'";
    $result = $conn->query($sql);
    if($result === true)
    {   
        if ($resultfeb) {
            $row = mysqli_fetch_assoc($resultfeb);
            $userCount = $row['user_count'];
            $label = "FEB";
            $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount'  WHERE `label`= '$label'";
            $result = $conn->query($sql);
            if($result === true)
            {   
                if ($resultmar) {
                    $row = mysqli_fetch_assoc($resultmar);
                    $userCount = $row['user_count'];
                    $label = "MAR";
                    $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount' WHERE `label`= '$label'";
                    $result = $conn->query($sql);
                    if($result === true)
                    {   
                        if ($resultapl) {
                            $row = mysqli_fetch_assoc($resultapl);
                            $userCount = $row['user_count'];
                            $label = "APL";
                            $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount'  WHERE `label`= '$label'";
                            $result = $conn->query($sql);
                            if($result === true)
                            {   
                                if ($resultmay) {
                                    $row = mysqli_fetch_assoc($resultmay);
                                    $userCount = $row['user_count'];
                                    $label = "MAY";
                                    $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount' WHERE `label`= '$label'";
                                    $result = $conn->query($sql);
                                    if($result === true)
                                    {   
                                        if ($resultjun) {
                                            $row = mysqli_fetch_assoc($resultjun);
                                            $userCount = $row['user_count'];
                                            $label = "JUN";
                                            $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount'  WHERE `label`= '$label'";
                                            $result = $conn->query($sql);
                                            if($result === true)
                                            {   
                                                if ($resultjul) {
                                                    $row = mysqli_fetch_assoc($resultjul);
                                                    $userCount = $row['user_count'];
                                                    $label = "JUL";
                                                    $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount' WHERE `label`= '$label'";
                                                    $result = $conn->query($sql);
                                                    if($result === true)
                                                    {   
                                                        if ($resultaug) {
                                                            $row = mysqli_fetch_assoc($resultaug);
                                                            $userCount = $row['user_count'];
                                                            $label = "AUG";
                                                            $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount'  WHERE `label`= '$label'";
                                                            $result = $conn->query($sql);
                                                            if($result === true)
                                                            {  
                                                                if ($resultsep) {
                                                                    $row = mysqli_fetch_assoc($resultsep);
                                                                    $userCount = $row['user_count'];
                                                                    $label = "SEP";
                                                                    $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount' WHERE `label`= '$label'";
                                                                    $result = $conn->query($sql);
                                                                    if($result === true)
                                                                    {   
                                                                        if ($resultoct) {
                                                                            $row = mysqli_fetch_assoc($resultoct);
                                                                            $userCount = $row['user_count'];
                                                                            $label = "OCT";
                                                                            $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount'  WHERE `label`= '$label'";
                                                                            $result = $conn->query($sql);
                                                                            if($result === true)
                                                                            {   
                                                                                if ($resultnov) {
                                                                                    $row = mysqli_fetch_assoc($resultnov);
                                                                                    $userCount = $row['user_count'];
                                                                                    $label = "NOV";
                                                                                    $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount' WHERE `label`= '$label'";
                                                                                    $result = $conn->query($sql);
                                                                                    if($result === true)
                                                                                    {   
                                                                                        if ($resultdec) {
                                                                                            $row = mysqli_fetch_assoc($resultdec);
                                                                                            $userCount = $row['user_count'];
                                                                                            $label = "DEC";
                                                                                            $sql = "UPDATE `transaction_volume_data` SET `value`='$userCount'  WHERE `label`= '$label'";
                                                                                            $result = $conn->query($sql);
                                                                                            if($result === true)
                                                                                            {   
                                                                                                
                                                                                            }else
                                                                                            { 
                                                                                                echo(" failed " .$sql. "<br>" .$conn->error );
                                                                                            }
                                                                                            } else {
                                                                                                echo "Error: " . mysqli_error($conn);
                                                                                            }
                                                                                        
                                                                                    }else
                                                                                    { 
                                                                                        echo(" failed " .$sql. "<br>" .$conn->error );
                                                                                    }
                                                                                    } else {
                                                                                        echo "Error: " . mysqli_error($conn);
                                                                                    }

                                                                                
                                                                            }else
                                                                            { 
                                                                                echo(" failed " .$sql. "<br>" .$conn->error );
                                                                            }
                                                                            } else {
                                                                                echo "Error: " . mysqli_error($conn);
                                                                            }
                                                                        
                                                                    }else
                                                                    { 
                                                                        echo(" failed " .$sql. "<br>" .$conn->error );
                                                                    }
                                                                    } else {
                                                                        echo "Error: " . mysqli_error($conn);
                                                                    } 
                                                                
                                                            }else
                                                            { 
                                                                echo(" failed " .$sql. "<br>" .$conn->error );
                                                            }
                                                            } else {
                                                                echo "Error: " . mysqli_error($conn);
                                                            }
                                                        
                                                    }else
                                                    { 
                                                        echo(" failed " .$sql. "<br>" .$conn->error );
                                                    }
                                                    } else {
                                                        echo "Error: " . mysqli_error($conn);
                                                    }
                                                
                                                
                                            }else
                                            { 
                                                echo(" failed " .$sql. "<br>" .$conn->error );
                                            }
                                            } else {
                                                echo "Error: " . mysqli_error($conn);
                                            }
                                        
                                    }else
                                    { 
                                        echo(" failed " .$sql. "<br>" .$conn->error );
                                    }
                                
                                    } else {
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                
                            }else
                            { 
                                echo(" failed " .$sql. "<br>" .$conn->error );
                            }
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        
                        
                    }else
                    { 
                        echo(" failed " .$sql. "<br>" .$conn->error );
                    }
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }

            }else
            { 
                echo(" failed " .$sql. "<br>" .$conn->error );
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
    }else
    { 
        echo(" failed " .$sql. "<br>" .$conn->error );
    }
    } else {
        echo "Error: " . mysqli_error($conn);
    }


// Close the database connection
mysqli_close($conn);
?>