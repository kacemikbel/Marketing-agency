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

function getTotalUserSubmissions($conn) {
    $sql= "SELECT COUNT(*) as count FROM user_submission";
    $result = $conn->query($sql);
    return $result->fetch_assoc()['count'];
}

$totalBlogPosts = getTotalBlogPosts($conn);
$totalProjects = getTotalProjects($conn);
$totalUserSubmissions = getTotalUserSubmissions($conn);

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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            background-color: #2c3e50;
        }
        .dashboard-title {
            color: #2c3e50;
        }
        .stat-card {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            transition: all 0.3s ease;
            margin: 10px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            cursor: pointer;
            overflow: hidden;
            position: relative;
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        .stat-card:hover {
            transform: rotateY(10deg) rotateX(10deg) scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .stat-card:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.1));
            transition: transform 0.5s cubic-bezier(0.23, 1, 0.320, 1);
            z-index: 1;
        }
        .stat-card:hover:before {
            transform: translateX(-100%);
        }
        .stat-card:after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.1));
            transition: transform 0.5s cubic-bezier(0.23, 1, 0.320, 1);
            z-index: 1;
        }
        .stat-card:hover:after {
            transform: translateX(100%);
        }
        .stat-card-content {
            position: relative;
            z-index: 2;
        }
        .stat-card-title {
            font-size: 24px;
            font-weight: 700;
            color: inherit;
            text-transform: uppercase;
        }
        .stat-card-text {
            color: inherit;
            opacity: 0.8;
            font-size: 14px;
        }
    </style>
</head>
<body class="bg-luxury h-screen flex">
    <div class="sidebar w-1/4 h-full p-5">
        <h2 class="text-2xl font-bold mb-6 text-white">Admin Dashboard</h2>
        <ul class="text-white ">
            <li class="mb-3"><a href="#" class="hover:text-yellow-500">Dashboard</a></li>
            <li class="mb-3"><a href="blog.php" class="hover:text-yellow-500">Manage Blogs</a></li>
            <li class="mb-3"><a href="projects.php" class="hover:text-yellow-500">Manage Projects</a></li>
            <li class="mb-3"><a href="usersub.php" class="hover:text-yellow-500">Manage User Submissions</a></li>
            <li class="mb-3"><a href="recruitment.php" class="hover:text-yellow-500">Manage Recruitment</a></li>
        
        </ul>
    </div>
    <div class="content w-3/4 p-8">
        <h1 class="dashboard-title text-4xl font-bold mb-8">Welcome to the Admin Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="stat-card">
                <div class="stat-card-content">
                    <h2 class="stat-card-title">Total Blog Posts</h2>
                    <p class="stat-card-text"><?php echo $totalBlogPosts; ?></p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-card-content">
                    <h2 class="stat-card-title">Total Projects</h2>
                    <p class="stat-card-text"><?php echo $totalProjects; ?></p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-card-content">
                    <h2 class="stat-card-title">Total User Submissions</h2>
                    <p class="stat-card-text"><?php echo $totalUserSubmissions; ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
