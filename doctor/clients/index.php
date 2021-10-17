<?php
// Start session
// error_reporting(0);
session_start();

require_once '../../admin/config/connect.php';
require_once '../../admin/config/functions.php';
require_once '../../admin/config/db.php';

checkAuth('doctors','index.php');

$sql = "SELECT * FROM doctors WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);


$query = 'SELECT * FROM clients WHERE doctor_unID = "'.$_SESSION['unID'].'"';
$gett = mysqli_query($connect,$query);
?>
<?php require_once '../config/headerIn.php'; ?>

                                <!-- CODE HERE -->
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Clients</div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>

                                                    <th scope="col">Name</th>
                                                    <th scope="col">Result</th>
                                                    <th scope="col" style="text-align: center;">Handle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($clients = mysqli_fetch_assoc($gett)) { ?>
                                                    <tr>
                                                        <td><?php echo $clients['name']; ?></td>
                                                        <td><?php echo $clients['result']; ?></td>
                                                        <td style="text-align: center;">
                                                            <a href="show.php?id=<?php echo $clients['unID']; ?>">
                                                                <button class="btn btn-info">Show</button>
                                                                
                                                            </a>
                                                            <a href="../chat/chatroom.php?id=<?php echo $clients['unID']; ?>">
                                                                <button class="btn btn-success">Chat</button>
                                                            </a>
                                                            <a href="delete.php?id=<?php echo $client['unID']; ?>">
                                                                <button class="btn btn-danger">Delete</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END CODE -->
                            <?php require_once '../config/footerIn.php'; ?>