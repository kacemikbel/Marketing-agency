<?php 
include('../../php/connectdb.php');

$sql = "SELECT * FROM user_submission";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Submissions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-8 text-center">User Submissions</h1>
    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">User Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Telephone Number</th>
                    <th class="px-4 py-3">Message</th>
                    <th class="px-4 py-3">Options</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php 
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='px-4 py-3 text-center'>" . $row["id"] . "</td>";
                        echo "<td class='px-4 py-3 text-center'>" . $row["username"] . "</td>";
                        echo "<td class='px-4 py-3 text-center'>" . $row["email"] . "</td>";
                        echo "<td class='px-4 py-3 text-center'>" . $row["telephone"] . "</td>";
                        echo "<td class='px-4 py-3 text-center'>" . $row["message"] . "</td>";
                        echo "<td class='px-4 py-3 text-center'>" . $row["option"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='px-4 py-3 text-center'>No submissions found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
