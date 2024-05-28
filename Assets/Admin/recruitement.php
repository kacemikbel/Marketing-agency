<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment Applications</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Recruitment Applications</h1>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-400">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Phone</th>
                        <th class="px-4 py-2">CV</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Submission Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      include('../../php/connectdb.php');

                    // Fetch data from the "recruit" table
                    $sql = "SELECT * FROM recruit";
                    $result = $conn->query($sql);

                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='border px-4 py-2'>" . $row["id"] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row["email"] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row["phone"] . "</td>";
                        echo "<td class='border px-4 py-2'><a href='uploads/" . $row["cv_filename"] . "' target='_blank'>Download CV</a></td>";
                        echo "<td class='border px-4 py-2'><a href='uploads/" . $row["image_filename"] . "' target='_blank'>View Image</a></td>";
                        echo "<td class='border px-4 py-2'>" . $row["submission_date"] . "</td>";
                        echo "</tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
