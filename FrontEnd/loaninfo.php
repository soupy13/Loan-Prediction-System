<?php
$host = 'localhost';
$dbname = 'lps_eightsemproject';
$username = 'root';
$password = '';

$connection = new mysqli($host, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT * FROM loanapplication";
$result = $connection->query($query);

$loans = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $loans[] = $row;
    }
}
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Applications</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
            color: #212529;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            width: 90%;
            max-width: 1200px;
            background: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #dee2e6;
        }
        th {
            background: #007bff;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:hover {
            background: #e9ecef;
            cursor: pointer;
        }
        .footer {
            text-align: center;
            color: #6c757d;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Loan Applications</h1>
        <table id="loanTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Credit Score</th>
                    <th>Loan Amount</th>
                    <th>Occupation</th>
                    <th>Monthly Income</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Previous Credit</th>
                    <th>Previous Credit Details</th>
                    <th>Education</th>
                    <th>Application Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loans as $loan): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($loan['id']); ?></td>
                        <td><?php echo htmlspecialchars($loan['name']); ?></td>
                        <td><?php echo htmlspecialchars($loan['mobile']); ?></td>
                        <td><?php echo htmlspecialchars($loan['email']); ?></td>
                        <td><?php echo htmlspecialchars($loan['credit_score']); ?></td>
                        <td><?php echo htmlspecialchars($loan['loan_amount']); ?></td>
                        <td><?php echo htmlspecialchars($loan['occupation']); ?></td>
                        <td><?php echo htmlspecialchars($loan['monthly_income']); ?></td>
                        <td><?php echo htmlspecialchars($loan['address']); ?></td>
                        <td><?php echo htmlspecialchars($loan['date_of_birth']); ?></td>
                        <td><?php echo htmlspecialchars($loan['previous_credit']); ?></td>
                        <td><?php echo htmlspecialchars($loan['previous_credit_details']); ?></td>
                        <td><?php echo htmlspecialchars($loan['education']); ?></td>
                        <td><?php echo htmlspecialchars($loan['applicationdate']); ?></td>
                        <td>
    <?php if ($loan['action'] == 0): ?>
        <button style="background-color: red; color: white;">Applied</button>
    <?php elseif ($loan['action'] == 1): ?>
        <button style="background-color: green; color: white;">Action Taken</button>
    <?php else: ?>
        <button style="background-color: blue; color: white;">Under Process</button>
    <?php endif; ?>
</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="footer">Fin-Ai Loan Prediction System</p>
    </div>
</body>
</html>
