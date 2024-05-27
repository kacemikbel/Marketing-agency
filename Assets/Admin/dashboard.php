<?php 
include('../../php/connectdb.php');

function getTotalBlogPosts($conn) {
    $sql = "SELECT COUNT(*) as count FROM blog_posts";
    $result = $conn->query($sql);
    return $result->fetch_assoc()['count'];
}

function getTotalProjects($conn) {
    $sql = "SELECT COUNT(*) as count FROM projects";
    $result = $conn->query($sql);
    return $result->fetch_assoc()['count'];
}
function getTotalUsersabmission($conn) {
    $sql= "SELECT COUNT(*) as count FROM user_submission";
    $result = $conn->query($sql);
    return $result->fetch_assoc() ['count'];


}

$totalBlogPosts = getTotalBlogPosts($conn);
$totalProjects = getTotalProjects($conn);
$totalusersubmission=getTotalUsersabmission($conn);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
    
        .bg-luxury {
            background: linear-gradient(45deg, #E8DACE, #DBCBBC);
        }
        .sidebar {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .dashboard-title {
            color: #2c3e50;
        }
        .stat-card {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 20px;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06), 0 9px 12px -1px rgba(0, 0, 0, 0.1);
        }
        .stat-card h2 {
            color: #2c3e50;
        }
        .stat-card p {
            color: #555;
        }
    </style>
</head>
<body class="bg-luxury">
    <div class="flex">
        <div class="sidebar w-1/4 bg-gray-800 text-white h-screen p-5">
            <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>
            <ul>
                <li class="mb-3"><a href="#" class="hover:text-yellow-500">Dashboard</a></li>
                <li class="mb-3"><a href="blog.php" class="hover:text-yellow-500">Manage Blogs</a></li>
                <li class="mb-3"><a href="projects.php" class="hover:text-yellow-500">Manage Projects</a></li>
                <li class="mb-3"><a href="usersub.php" class="hover:text-yellow-500">Manage user_submission</a></li>
                <li class="mb-3"><a href="recrut.php" class="hover:text-yellow-500">Manage recrutment</a></li>


            </ul>
        </div>
        <div class="content w-3/4 p-8 ">
            <h1 class="dashboard-title text-4xl font-bold mb-8">Welcome to the Admin Dashboard</h1>
            <div class="inline-bloxk">
                <div class="stat-card w-1/2 shadow-lg mb-8">
                    <h2 class="text-2xl font-bold mb-4">Total Blog Posts</h2>
                    <p class="text-3xl"><?php echo $totalBlogPosts; ?></p>
                </div>
                <div class="stat-card w-1/2 shadow-lg mb-8">
                    <h2 class="text-2xl font-bold mb-4">Total Projects</h2>
                    <p class="text-3xl"><?php echo $totalProjects; ?></p>
                </div>
                <div class="stat-card w-1/2 shadow-lg mb-8">
                    <h2 class="text-2xl font-bold mb-4">Total user submission</h2>
                    <p class="text-3xl"><?php echo $totalusersubmission; ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
