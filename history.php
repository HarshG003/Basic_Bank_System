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
    <title>TSF BANK</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="assets\favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="styles\nav.css">
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

    <h2 class="text-center m-3">
        <strong>TRANSACTION HISTORY</strong>
    </h2>


    <!-- options -->



    <!-- Table -->
    <div class="table-responsive-sm">
        <table class="table table-hover table-striped table-sm table-bordered ">
            <thead style="color : black;" class="table-danger">
                <tr>
                    <th class="text-center">S.No.</th>
                    <th class="text-center">Sender</th>
                    <th class="text-center">Receiver</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include 'dbconnection.php';

                $sql = "SELECT * FROM transaction";

                $query = mysqli_query($conn, $sql);

                while ($rows = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr style="color : black;">
                        <td class="text-center py-2">
                            <?php echo $rows['sno']; ?>
                        </td>
                        <td class="text-center py-2">
                            <?php echo $rows['sender']; ?>
                        </td>
                        <td class="text-center py-2">
                            <?php echo $rows['receiver']; ?>
                        </td>
                        <td class="text-center py-2">
                            <?php echo $rows['balance']; ?>
                        </td>
                        <td class="text-center py-2">
                            <?php echo $rows['datetime']; ?>
                        </td>

                        <?php
                }

                ?>
            </tbody>
        </table>

    </div>
    </div>

    <div class="d-grip gap-2 col-6 mx-auto text-center p-3 mb-2">
        <a href="money.php"><button type="button" class="btn btn-warning btn-lg mb-3">CLICK HERE TO TRANSFER
                MONEY</button></a>
    </div>

    <div class="foot"
        style="position: absolute; bottom: 0; background-color:rgb(55 51 51); width:100%; text-align:center; height: 30px; ">
        <p style="line-height: 30px; ">&copy; TSF BANK 2024</p>
    </div>

</body>

</html>
