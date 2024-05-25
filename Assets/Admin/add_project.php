<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../php/connectdb.php';

$title = $description = $image_url = $category1 = $category2 = "";
$title_err = $description_err = $image_url_err = $category1_err = $category2_err = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $category1 = $_POST['category1'];
    $category2 = $_POST['category2'];

    echo "Title: $title<br>Description: $description<br>Image URL: $image_url<br>Category 1: $category1<br>Category 2: $category2<br>";

    $sql = "INSERT INTO projects (title, description, image_url, category1, category2) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sssss", $title, $description, $image_url, $category1, $category2);

    if ($stmt->execute()) {
        echo "New project added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <style>

    </style>
</head>
<body>

<div class="container">
    <h2>Add Project</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($title); ?>">
            <span class="help-block"><?php echo $title_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
            <label>Description</label>
            <textarea name="description" class="form-control"><?php echo htmlspecialchars($description); ?></textarea>
            <span class="help-block"><?php echo $description_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($image_url_err)) ? 'has-error' : ''; ?>">
            <label>Image URL</label>
            <input type="text" name="image_url" class="form-control" value="<?php echo htmlspecialchars($image_url); ?>">
            <span class="help-block"><?php echo $image_url_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($category1_err)) ? 'has-error' : ''; ?>">
            <label>Category 1</label>
            <input type="text" name="category1" class="form-control" value="<?php echo htmlspecialchars($category1); ?>">
            <span class="help-block"><?php echo $category1_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($category2_err)) ? 'has-error' : ''; ?>">
            <label>Category 2</label>
            <input type="text" name="category2" class="form-control" value="<?php echo htmlspecialchars($category2); ?>">
            <span class="help-block"><?php echo $category2_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <a href="projects.php" class="btn btn-default">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
