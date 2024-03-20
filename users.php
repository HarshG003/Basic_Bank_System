<?php
include 'dbconnection.php';

if (isset ($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);


    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Negative value cannot be transferred !")';
        echo '</script>';
    } else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Sorry! you have insufficient balance !")';
        echo '</script>';
    } else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Zero value cannot be transferred !')";
        echo "</script>";
    } else {
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);

        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successfully !');
                                     window.location='history.php';
                           </script>";

        }

        $newbalance = 0;
        $amount = 0;
    }

}
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="assets\favicon.png" type="image/x-icon">
    <title>TSF BANK</title>
    <link rel="stylesheet" href="styles\nav.css">
    <link rel="stylesheet" href="styles/style2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>

<body>

    <header>

        <nav>

            <div class="left">
                <SPAN>TSF BANK</SPAN>
            </div>

            <div class="right">
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="#about">ABOUT</a></li>
                    <li><a href="#contact">CONTACT</a></li>
                </ul>
            </div>

        </nav>

    </header>

    <class class="welcome">
        <h2>
            <img src="logos/m1.webp" alt="Bank" width="75" height="75" style="font-weight: bold;"> <strong>Money
                Transfer</strong> <img src="logos/m2.webp" alt="Bank" width="75" height="75">
        </h2>
    </class>


    <div class="d-grip gap-2 col-6 mx-auto text-center p-3 mb-2">
        <a href="history.php"><button type="button" class="btn btn-dark btn-lg mb-3">See all Transaction
                History</button></a>
    </div>
    </div>

    <div class="container">
        <h2 class="text-center pt-4" style="color : black;">Customer Details</h2>
        <?php
        include 'dbconnection.php';

        $sid = $_GET['id'];
        $sql = "SELECT * FROM  users where id=$sid";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        }
        $rows = mysqli_fetch_assoc($result);
        ?>
        <form method="post" name="tcredit" class="tabletext"><br>
            <div>
                <table class="table table-striped table-hover">
                    <tr style="color : black;" class="table-primary">
                        <th class="text-center">Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Balance</th>
                    </tr>
                    <tr style="color : black;">
                        <td class=" text-center py-2">
                            <?php echo $rows['id'] ?>
                        </td>
                        <td class=" text-center py-2">
                            <?php echo $rows['name'] ?>
                        </td>
                        <td class=" text-center py-2">
                            <?php echo $rows['email'] ?>
                        </td>
                        <td class=" text-center py-2">
                            <?php echo $rows['balance'] ?>
                        </td>
                    </tr>
                </table>
            </div>
            <h2 class="text-center pt-4" style="color : black;">Transer Money Here !</h2>
            <label style="color : black;"><strong>Transfer To:</strong></label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                include 'connect.php';
                $sid = $_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Error " . $sql . "<br>" . mysqli_error($conn);
                }
                while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <option class="table" value="<?php echo $rows['id']; ?>">

                        <?php echo $rows['name']; ?> (Balance:
                        <?php echo $rows['balance']; ?> )

                    </option>
                    <?php
                }
                ?>
                <div>
            </select>
            <br>
            <br>
            <label style="color : black;"><strong>Amount:</strong></label>
            <input type="number" class="form-control" name="amount" required>
            <br><br>
            <div class="text-center">
                <button class="btn btn-outline-dark mb-3" name="submit" type="submit" id="myBtn">Fill the Amount and
                    Transfer</button>
            </div>
        </form>
    </div>

    <div class="foot"
        style="position: absolute; bottom: 0; background-color:rgb(55 51 51); width:100%; text-align:center; height: 30px; ">
        <p style="line-height: 30px; ">&copy; TSF BANK 2024</p>
    </div>
</body>

</html>
