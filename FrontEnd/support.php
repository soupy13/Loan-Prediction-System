<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lps_eightsemproject";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$recordDetails = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = intval($_POST['id']);
        $sql = "UPDATE contactsupport SET status=1 WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $detailsSql = "SELECT * FROM contactsupport WHERE id=$id";
            $detailsResult = $conn->query($detailsSql);
            if ($detailsResult->num_rows > 0) {
                $record = $detailsResult->fetch_assoc();
                $recordDetails = "ID: " . $record['id'] . "<br>Name: " . $record['name'] . "<br>Email: " . $record['email'] . "<br>Contact: " . $record['contact'] . "<br>Message: " . $record['message'];
                $message = "Issue Resolved Successfully ✅";
            } else {
                $message = "Record not found";
            }
        } else {
            $message = "Error updating record: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM contactsupport WHERE status=0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Contact Support Records</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Fin-Ai Support System</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/admin.html">Back</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Contact Support Records</h2>
        
        <form method="POST" class="mb-4">
            <div class="form-group">
                <label for="id">Enter ID to update status:</label>
                <input type="number" class="form-control" name="id" id="id" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Message</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['contact']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td>
                                <button class="btn btn-danger" onclick="confirmResolve(<?php echo $row['id']; ?>)">Pending</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h4><?php echo $message; ?></h4>
                    <div id="recordDetails"><?php echo $recordDetails; ?></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            <?php if ($message): ?>
                $('#confirmationModal').modal('show');
            <?php endif; ?>
        });

        let currentId;
        function confirmResolve(id) {
            currentId = id;
            $('#confirmModal').modal('show');
        }

        $('#confirmYes').on('click', function() {
            $.ajax({
                type: "POST",
                url: "update_status.php",
                data: { id: currentId },
                success: function(response) {
                    alert(response);
                    location.reload();
                },
                error: function() {
                    alert("An error occurred while updating the status.");
                }
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>
