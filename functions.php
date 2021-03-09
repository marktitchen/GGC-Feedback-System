<?php
session_start();


//works wednesday
function logInUser() {   
    include("connect.php");
  
    if(isset($_POST)){
        $emailaddress = $_POST['emailAddress'];
        $userpassword = $_POST['userPassword'];
    }
        $sql = "SELECT * FROM login WHERE emailAddress = '$emailaddress' AND userPassword = '$userpassword'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // check the category of the user and redirect
            while($row = $result->fetch_assoc()) {
                $_SESSION['user']['userID'] = $row['userID'];
                $_SESSION['user']['accountCategory'] = $row['accountCategory'];

                $accountCategory = $row['accountCategory'];
                if ($accountCategory == 'member') {
                    header('Location: member.php');
                //} elseif ($accountCategory == 'photographer') {
                     //header('Location: photographer.php');
                } elseif ($accountCategory == 'admin') {
                    header('Location: administrator.php');    
                } else {
                    header('Location: logIn.php');    
                }
            }
        } else {
            header('Location: logIn.php');  
        }       
}


// works wednesday
function registerAccount() {

    include("connect.php");
    
    if(isset($_POST)){
        $membershipcategory = $_POST['membershipCategory'];
        $emailaddress = $_POST['emailAddress'];
        $userPassword = $_POST['userPassword'];
        
    }
    
    $sql = "INSERT INTO login (userPassword, emailAddress)
    VALUES ('$userPassword', '$emailaddress')";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    $sql = "INSERT INTO members (membershipCategory, userID)
    VALUES ('$membershipcategory', '$last_id')";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: sucess.php');
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    
   
}






//works wednesday
function updateAccount() {
   
    include("connect.php");
            
    if(isset($_POST)){
        $customerid = $_POST['customerID'];
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        
    }
    
    $sql = "UPDATE customers SET fName='$fname', lName='$lname'WHERE customerID= $customerid";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}

// works - wednesday
function deleteAccount() {
    
    include("connect.php");
        
    if(isset($_POST)){
        $customerid = $_POST['customerID'];
       
    }

    // sql to delete a record
    $sql = "DELETE FROM customers WHERE customerID='$customerid'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}



// works wednesday
function leaveFeedback() {

    include("connect.php");
    $userid = $_SESSION['user']['userID'];
    
    if(isset($_POST)){
        $holeno = $_POST['holeNo'];
        $coursecategory = $_POST['courseCategory'];
        $rating = $_POST['rating'];
        $messageus = $_POST['messageUs'];
    }
    
    $sql = "INSERT INTO feedback (holeNo, courseCategory, rating, messageUs, userID)
    VALUES ('$holeno', '$coursecategory', '$rating', '$messageus', $userid)";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    
   
}

// 
function resetUserPassword() {

    include("connect.php");
            
    if(isset($_POST)){
        
        $emailaddress = $_POST['emailAddress'];
        $userpassword = $_POST['userPassword'];
        
    }
    
    $sql = "UPDATE login SET userPassword='$userPassword' WHERE emailAddress= $emailaddress";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
   

function errorCatch() {
    //code to be executed;
    echo "Error Catch Function";
}


if(isset($_POST)){
    $userChoice = $_POST['userchoice'];

    switch ($userChoice) {
        case "loginuser": logInUser(); break;
        case "updateaccount": updateAccount(); break;
        case "registeraccount": registerAccount();break;
        case "deleteaccount": deleteAccount();break;
        case "leavefeedback": leaveFeedback(); break;
        case "resetuserpassword": resetUserPassword(); break;
        default: errorCatch();
    }
}

?>