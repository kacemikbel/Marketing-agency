<?php
// Include database connection file
include_once "../Marketing-agency/php/connectdb.php";

// Define variables and initialize with empty values
$title = $description = $image_url = $category1 = $category2 = "";
$title_err = $description_err = $image_url_err = $category1_err = $category2_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate title
    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter a title.";
    } else {
        $title = trim($_POST["title"]);
    }

    // Validate description
    if (empty(trim($_POST["description"]))) {
        $description_err = "Please enter a description.";
    } else {
        $description = trim($_POST["description"]);
    }

    // Validate image URL
    if (empty(trim($_POST["image_url"]))) {
        $image_url_err = "Please enter an image URL.";
    } else {
        $image_url = trim($_POST["image_url"]);
    }

    // Validate category1
    if (empty(trim($_POST["category1"]))) {
        $category1_err = "Please enter category1.";
    } else {
        $category1 = trim($_POST["category1"]);
    }

    // Validate category2
    if (empty(trim($_POST["category2"]))) {
        $category2_err = "Please enter category2.";
    } else {
        $category2 = trim($_POST["category2"]);
    }

    // Check input errors before inserting into database
    if (empty($title_err) && empty($description_err) && empty($image_url_err) && empty($category1_err) && empty($category2_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO projects (title, description, image_Url, category1, category2) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_title, $param_description, $param_image_url, $param_category1, $param_category2);

            // Set parameters
            $param_title = $title;
            $param_description = $description;
            $param_image_url = $image_url;
            $param_category1 = $category1;
            $param_category2 = $category2;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to projects page
                header("location: projects.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <style>
        /* Your CSS styling here */
    </style>
</head>
<body>

<div class="container">
    <h2>Add Project</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
            <span class="help-block"><?php echo $title_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
            <label>Description</label>
            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
            <span class="help-block"><?php echo $description_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($image_url_err)) ? 'has-error' : ''; ?>">
            <label>Image URL</label>
            <input type="text" name="image_url" class="form-control" value="<?php echo $image_url; ?>">
            <span class="help-block"><?php echo $image_url_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($category1_err)) ? 'has-error' : ''; ?>">
            <label>Category 1</label>
            <input type="text" name="category1" class="form-control" value="<?php echo $category1; ?>">
            <span class="help-block"><?php echo $category1_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($category2_err)) ? 'has-error' : ''; ?>">
            <label>Category 2</label>
            <input type="text" name="category2" class="form-control" value="<?php echo $category2; ?>">
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
