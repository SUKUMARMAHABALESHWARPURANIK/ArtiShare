<?php
if (isset($_POST['title']) && isset($_POST['post_text'])) {
    // Check whether the boxes have been filled
    if ($_POST['title'] != '' && $_POST['post_text'] != '') {
        // Establish a database connection
        require_once("connection.php");

        date_default_timezone_set('Asia/Kolkata');
        $date = date("y-m-d h:i:sa");

        // Handle image uploads if any
        if (!empty($_FILES['image']['name'])) {
            // Specify the directory where you want to store uploaded images
            $uploadDirectory = 'uploads/';

            // Generate a unique filename for the uploaded image
            $uniqueFilename = uniqid() . '_' . $_FILES['image']['name'];

            // Specify the full path to the uploaded image
            $targetFilePath = $uploadDirectory . $uniqueFilename;

            // Check if the uploaded file is an image
            $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

            if (in_array($imageFileType, $allowedExtensions)) {
                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    // The image has been successfully uploaded
                    // Now, you can store the image path in your database
                    $imagePath = $targetFilePath;
                } else {
                    echo 'Failed to upload the image.';
                    exit;
                }
            } else {
                echo 'Invalid image file type. Allowed types: JPG, JPEG, PNG, GIF.';
                exit;
            }
        } else {
            // No image uploaded
            $imagePath = ''; // Set it to an empty string
        }

        // Insert the post data into the database
        $title = $_POST['title'];
        $content = $_POST['post_text'];
        $status = 'publish';

        // You should use prepared statements to avoid SQL injection
        $stmt = $conn->prepare("INSERT INTO post (title, content, date, status, image_path) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $content, $date, $status, $imagePath);

        if ($stmt->execute()) {
            echo 'Successfully done';
        } else {
            echo 'Problem in query: ' . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo 'Please fill all the boxes';
    }
}
?>
