<?php
$host ='localhost';
$user='root';
$password='';
$database="lps_eightsemproject";
@$connection =mysqli_connect ($host,$user,$password,$database);
?>

<?php 
if (isset($_POST["button"])) {   
    if (!$connection) {
        echo "Technical Issue Occurred";
    } else {
        $id = 0;
        $fname = $_POST["Fname"];
        $lname = $_POST["Lname"];
        $email = $_POST["emails"];
        $mobileno = $_POST["mobilenos"];
        $messsage = $_POST["message"];
        $name = $fname . " " . $lname;

        $query = "INSERT INTO contactsupport VALUES ($id, '$name', '$email', '$mobileno', '$messsage',0)";
        $qtodb = mysqli_query($connection, $query);

        if (!$qtodb) {
            echo '<script>alert ("Technical Issu Occured, Our Team Will Fix It Soon");location.replace ("http://localhost/contact.php")</script>';
        } else {
            echo '<script>alert ("Thanku For Contact Us, Our Team Will Get Back To You Soon");location.replace ("http://localhost/contact.php")</script>';
        }
    }
}
?>
<?php 
if (isset($_POST['applyloanbutton'])) {
    $connection = mysqli_connect("localhost", "root", "", "lps_eightsemproject");

    if ($connection) {
        $id = 0;
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $creditScore = $_POST['CreditScore'];
        $loanAmount = $_POST['loanamount'];
        $occupation = $_POST['Occupation'];
        $income = $_POST['income'];
        $address = $_POST['Adress'];
        $dob = $_POST['dob'];
        $previousCredit = $_POST['previouscredit'];
        $previousCreditDetails = $_POST['pycreditdetails'];
        $education = $_POST['education'];
        $timestamp = $_POST['timestamp'];
        $a = 0;

        $loanapplyquery = "INSERT INTO loanapplication VALUES ('$id', '$name', '$mobile', '$email', '$creditScore', '$loanAmount', '$occupation', '$income', '$address', '$dob', '$previousCredit', '$previousCreditDetails', '$education', '$timestamp', '$a')";
        
        $loanquery = mysqli_query($connection, $loanapplyquery);

        if ($loanquery) {
            echo '<script>alert("Thank you for applying. We will get back to you soon."); location.replace("http://localhost/signup.html");</script>';
        } else {
            echo '<script>alert("Technical Issue Occurred. Our Team Will Fix It Soon."); location.replace("http://localhost/signup.html");</script>';
        }
    }
}

?>

<?php
//Login-------------------------->
if (isset($_POST['signinbuttons'])) {
    $userid = $_POST['userid'];
    $password = $_POST['passwords'];

    if ($userid == "admin" && $password == "admin1234") {
        echo "<script> alert('Welcome Admin');location.replace('http://localhost/admin.html');</script>";
    } else {
        echo "<script>alert('Invalid Credentials'); location.replace('http://localhost/login.php');</script>";
    }
}
?>
