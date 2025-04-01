<?php
include('connection.php');
session_start();
$_SESSION['reserve'] = 0;
if(isset($_POST['res']))
{    
    
    $email = $_POST['email'];
    $cnum = $_POST['cnum'];
    $_SESSION['cnum'] = $_POST['cnum'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['address'] = $_POST['add'];
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['time'] = $_POST['time'];
    $_SESSION['email'] = $_POST['email'];
    $img_dir = $_FILES["id"]['name'];

    $email_query = "SELECT `email` FROM `reservation` WHERE `email` = '$email'";
    $cnum_query = "SELECT `cnum` FROM `reservation` WHERE `cnum` = '$cnum'";

    $email_result = mysqli_query($con, $email_query);
    $cnum_result = mysqli_query($con, $cnum_query);

    if(mysqli_num_rows($email_result) > 0)
    {
        ?>
        <script>
    
            alert("This email is already used");
            
        </script>
        <?php
    }
    else if(mysqli_num_rows($cnum_result) > 0)
    {
        ?>
        <script>
    
            alert("This contact number is already used");
            
        </script>
        <?php
    }
    else{

    
    if(move_uploaded_file($_FILES['id']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/test/uploaded/'.$img_dir))
    {
        $target_file = $_SERVER['DOCUMENT_ROOT'].'test/uploaded/'.$img_dir;
        $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $picname = ($_FILES['id']['name']);
        $photo = $picname;
        $_SESSION['img'] = $photo;
        if($imgFileType != "jpg" && $imgFileType != "jpeg" && $imgFileType != "png")
        {?>
        <script>
            alert("Please upload phot with extension .jpg/.png or .jpeg");
        </script>
        <?php
        
        }
        else
        {
            header('Location:boat_booking.html');
        }
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: whitesmoke;
            margin: 0;
            padding: 0 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            width: 420px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        label {
            font-weight: 600;
            display: block;
            margin-top: 15px;
            color: #444;
            text-align: left;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #ff758c;
            outline: none;
            box-shadow: 0 0 8px rgba(255, 117, 140, 0.5);
        }

        .reserve {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: 0.3s;
        }

        .reserve:hover {
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            box-shadow: 0 6px 12px rgba(255, 117, 140, 0.5);
        }

        input, button {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <div class="formbx">

            <form method="post" enctype="multipart/form-data" class="signinform" id="form" action="reservation.php">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="add" required>

                <label for="contact">Contact Number:</label>
                <input type="number" id="contact" name="cnum" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="id">Date:</label>
                <input type="date" id="id" name="date" required>

                <label for="id">Time</label>
                <input type="time" id="id" name="time" required>
                
                <label for="id">Upload Valid ID:</label>
                <input type="file" id="id" name="id" required>
                
                
                <input type="submit" id='submit' class= "reserve" id="submit" value= "Proceed" name="res" >
                
            </form>
        </div>
    </div>
</body>
</html>