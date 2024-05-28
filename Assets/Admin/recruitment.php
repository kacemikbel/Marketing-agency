<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment Data</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-6xl bg-white rounded-lg shadow-2xl p-8 m-4">
        <h2 class="text-4xl font-bold mb-10 text-gray-800 text-center">Recruitment Data</h2>

        <?php
        require '../../php/connectdb.php';

        $sql = "SELECT email, phone, cv_filename, image_filename FROM recruit";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='overflow-x-auto'>";
            echo "<table class='min-w-full bg-white border border-gray-200'>";
            echo "<thead>
                    <tr class='bg-gray-800 text-white'>
                        <th class='w-1/4 py-3 px-4 uppercase font-semibold text-sm text-center'>Email</th>
                        <th class='w-1/4 py-3 px-4 uppercase font-semibold text-sm text-center'>Phone</th>
                        <th class='w-1/4 py-3 px-4 uppercase font-semibold text-sm text-center'>CV</th>
                        <th class='w-1/4 py-3 px-4 uppercase font-semibold text-sm text-center'>Image</th>
                    </tr>
                </thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr class='bg-gray-100 border-b border-gray-200'>";
                echo "<td class='py-3 px-4 text-center'>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td class='py-3 px-4 text-center'>" . htmlspecialchars($row['phone']) . "</td>";
                
                $cvPath = '../../php/uploads/' . htmlspecialchars($row['cv_filename']);
                echo "<td class='py-3 px-4 text-center'><a href='$cvPath' class='text-blue-500 hover:underline'>" . htmlspecialchars($row['cv_filename']) . "</a></td>";
                
                $imagePath = '../../php/uploads/' . htmlspecialchars($row['image_filename']);
                if (file_exists($imagePath) && exif_imagetype($imagePath)) {
                    echo "<td class='py-3 px-4 text-center'><img src='$imagePath' alt='Image' class='inline-block h-24 w-24 rounded-full border-2 border-gray-200'></td>";
                } else {
                    echo "<td class='py-3 px-4 text-center text-red-500'>No image available</td>";
                }
                
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p class='text-center text-gray-600'>No records found</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
