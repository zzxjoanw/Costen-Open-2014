<?
    

    session_start();
    if(!isset($_SESSION['isLoggedIn']))
    {
        $_SESSION['isLoggedIn'] = 0;
    }
    
    if(!isset($_GET['action']))
    {
        $_GET['action'] = "";
    }

    include 'includes/login.php'; //holds login credentials
    $connection = connect($host,$username,$password,$dbname);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Cotsen Open 2015 - About</title>
        <meta name="description" content="">
        <meta name="author" content="Laura">
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
         
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.css">
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/screen.css" />
                
        <style>
            span { height:30px; }
        </style>
    </head>
    <body style="top:0">
        <nav class="navbar navbar-default">
            <a href="index.php"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back to main site</a>
            <a href="admin.php">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back to admin overview
            </a>
        </nav>
            <?
                if($_SESSION['isLoggedIn'] == 0)
                {
                    if( (@$_POST['username']== $username) && (@$_POST['password']==$password) )
                    {
                        $_SESSION['isLoggedIn'] = 1;
                        header("Location:admin.php");
                    }
                    else
                    {
                        if(isset($_POST['bttnSubmit'])) { echo "You entered an invalid username and/or password."; }
                    ?>
                        <form name="login" action="admin.php" method="post">
                            <label for="username">Username:</label>
                            <input type="text" name="username">
                            
                            <label for="password">Password:</label>
                            <input type="password" name="password">
                            
                            <input type="submit" value="Submit" name="bttnSubmit">
                        </form>
                    <?
                    }
                }
                else
                {   
                    if($_GET['action'] == "view")
                    {
                        //drilldown query
                        $stmt = "SELECT AGANumber,fName,lName,dofb,country,street,city,state,zip,email,phone,club,regTime
                                 FROM tblContestant
                                 WHERE fName = ?
                                    AND lName = ?";
                                    
                        if(!$pps = $conn->prepare($stmt))
                        {
                            echo "Error: " . $conn->error;
                        }
                        
                        if(!$pps->bind_param('ss',$_GET['fname'],$_GET['lname']))
                        {
                            echo "Error: " . $conn->error;
                        }
                        
                        if(!$pps->execute())
                        {
                            echo "Error: " . $conn->error;
                        }
                        
                        if(!$pps->bind_result($AGANumber, $fname,$lname,$dob,$country,$street,$city,$state,$zip,$email,$phone,$club,
                            $regTime))
                        {
                            echo "Error: " . $conn->error;
                        }
                        
                        $currentAGANumber = -1;
                        
                        while($pps->fetch())
                        {
                            ?>
                                <form action="admin.php?action=update&num=<? echo $AGANumber ?>" method="post">
                                    <div>
                                        <label for="fname">First (Given) Name:</label>
                                        <input type="text" value="<? echo $fname ?>" name="fname">
                                    </div>
                                    <div>
                                    <label for="lname">Last (Family) Name:</label>
                                    <input type="text" value="<? echo $lname ?>" name="lname"><br/>
                                     </div>
                                    <div>
                                    <label for="dob">Date of Birth:</label>
                                    <input type="text" value="<? echo $dob ?>" name="dofb" id="datepicker">
                                     </div>
                                    <div>
                                    <label for="country">Country</label>
                                    <input type="text" value="<? echo $country ?>" name="country">
                                     </div>
                                    <div>
                                    <label for="street">Street</label>
                                    <input type="text" value="<? echo $street ?>" name="street">
                                     </div>
                                    <div>
                                    <label for="city">City</label>
                                    <input type="text" value="<? echo $city ?>" name="city">
                                     </div>
                                    <div>
                                    <label for="state">State:</label>
                                    <input type="text" value="<? echo $state ?>" name="state">
                                     </div>
                                    <div>
                                    <label for="zip">Zip: </label>
                                    <input type="text" value="<? echo $zip ?>" name="zip">
                                     </div>
                                    <div>
                                    <label for="email">Email</label>
                                    <input type="text" value="<? echo $email ?>" name="email">
                                     </div>
                                    <div>
                                    <label for="phone">Phone:</label>
                                    <input type="text" value="<? echo $phone ?>" name="phone">
                                     </div>
                                    <div>
                                    <label for="club">Club:</label>
                                    <input type="text" value="<? echo $club ?>" name="club">
                                     </div>
                                    <div>
                                    <input type="submit" value="Submit" name="bttnSubmit">
                                </form>
                            <?
                        }
                     
                        $pps->close();
                    }
                    else if($_GET['action'] == "update")
                    {
                        if(!$pps = $conn->prepare("UPDATE tblContestant SET fName=?,lName=?, dofb=?, country=?, street=?,
                        city=?,state=?, zip=?, email=?, phone=?, club=? WHERE AGANumber = ?"))
                        {
                            echo "Error: " . $pps->error;
                        }
                        
                        if(!$pps->bind_param("ssssssssssss", $_POST['fname'], $_POST['lname'], $_POST['dofb'],
                            $_POST['country'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['email'],
                            $_POST['phone'], $_POST['club'], $_GET['num']))
                            {
                                echo "Error: " . $pps->error;
                            }
                        
                        if(!$pps->execute())
                        {
                            echo "Error: " . $pps->error;
                        }
                        
                        if(!$pps->close())
                        {
                            echo "Error: " . $pps->error;
                        }
                    }
                    else if($_GET['action'] == 'delete')
                    {
                        echo "<form action='admin.php?action=confirm&AGANumber=" . $_GET['num'] . "&f=" . $_GET['fname'] . "&l=" . $_GET['lname'] . "' method='post'>";
                        echo "Really delete member " . $_GET['num'] . "?";
                        echo "<input type='submit' value='Delete' class='btn btn-warning'>";
                    }
                    else if($_GET['action'] == 'confirm')
                    {
                        echo "delete confirmation";
                        
                        if(!$pps = $conn->prepare("DELETE FROM tblContestant WHERE AGANumber = ? AND fName = ? AND lName = ?"))
                        {
                            echo "Error: " . $pps->error;
                        }
                        
                        if( (!$pps->bind_param("sss",$_GET['AGANumber'],$_GET['fname'],$_GET['lname'])) )
                        {
                            echo "Error: " . $pps->error;
                        }
                        
                        if(!$pps->execute())
                        {
                            echo "Error: " . $pps->error;
                        }
                        
                        if(!$pps->close())
                        {
                            echo "Error: " . $pps->error;
                        }
                    }
                    else
                    {
                        //main contestant list
                        $pps = $conn->prepare("SELECT fName,lName,AGANumber,club,regTime FROM tblContestant ORDER BY regTime DESC");
                        $pps->execute();
                        $pps->bind_result($fname,$lname,$AGANumber,$club,$regTime);
                        
                        ?>
                        <table border=1 width="100%">
                            <tr>
                                <th>View Details</th>
                                <th>Delete</th>
                                <th>First (Given) Name</th>
                                <th>Last (Family) Name</th>
                                
                                <th>AGA Number</th>
                                <th>Club Name</th>
                                
                                <th>Reg Time</th>
                                
                                <th></th>
                            </tr>
                        <?
                        while($row = $pps->fetch())
                        {
                            echo "<tr>";
                            
                            echo "<td>";
                            echo "<a href=\"admin.php?action=view&fname=".$fname."&lname=".$lname."\">";
                            echo "<span class=\"history glyphicon glyphicon-zoom-in\"></span>";
                            echo "</a>";
                            echo "</td>";
                            
                            echo "<td>";
                            echo "<a href=\"admin.php?action=delete&lname=".$lname."&fname=".$fname."&num=".$AGANumber."\">";
                            echo "<span class=\"delete glyphicon glyphicon-remove\"></span>";
                            echo "</a>";
                            echo "</td>";
                            
                            echo "<td>" . $fname . "</td>";
                            echo "<td>" . $lname . "</td>";
                            echo "<td>" . $AGANumber . "</td>";
                            echo "<td>" . $club . "</td>";
                            
                            echo "<td>" . $regTime . "</td>";
                            
                            echo "</tr>";
                        }
                    }
                }
            ?>
        </table>
    </body>
</html>