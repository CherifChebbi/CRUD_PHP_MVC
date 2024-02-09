<?php

include '../Controller/ClientC.php';

$error = "";

// create client
$client = null;

// create an instance of the controller
$clientC = new ClientC();
if (
    isset($_POST["idClient"]) &&
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["address"]) &&
    isset($_POST["dob"])
) {
    if (
        !empty($_POST["idClient"]) &&
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["address"]) &&
        !empty($_POST["dob"])
    ) {
        $client = new Client(
            $_POST['idClient'],
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['address'],
            new DateTime($_POST['dob'])
        );
        $clientC->updateClient($client, $_POST["idClient"]);
        header('Location:ListClients.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="ListClients.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idClient'])) {
        $client = $clientC->showClient($_POST['idClient']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idClient">Id Client:
                        </label>
                    </td>
                    <td><input type="text" name="idClient" id="idClient" value="<?php echo $client['idClient']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="firstName">First Name:
                        </label>
                    </td>
                    <td><input type="text" name="firstName" id="firstName" value="<?php echo $client['firstName']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lastName">Last Name:
                        </label>
                    </td>
                    <td><input type="text" name="lastName" id="lastName" value="<?php echo $client['lastName']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Address:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $client['address']; ?>" id="address">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dob">Date of Birth:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dob" id="dob" value="<?php echo $client['dob']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>