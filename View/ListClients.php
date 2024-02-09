<?php
include '../Controller/ClientC.php';
$clientC = new ClientC();
$list = $clientC->listClients();
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of clients</h1>
        <h2>
            <a href="addClient.php">Add Client</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Client</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $client) {
        ?>
            <tr>
                <td><?= $client['idClient']; ?></td>
                <td><?= $client['lastName']; ?></td>
                <td><?= $client['firstName']; ?></td>
                <td><?= $client['address']; ?></td>
                <td><?= $client['dob']; ?></td>
                <td align="center">
                    <form method="POST" action="updateClient.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $client['idClient']; ?> name="idClient">
                    </form>
                </td>
                <td>
                    <a href="deleteClient.php?idClient=<?php echo $client['idClient']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>