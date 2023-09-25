<?php
if (isset($_POST['title']) && isset($_POST['post_text'])) {
    // Check whether the boxes have been filled
    if ($_POST['title'] != '' && $_POST['post_text'] != '') {
        // Establish a database connection
        require_once("connection.php");

        date_default_timezone_set('Asia/Kolkata');
        $date = date("y-m-d h:i:sa");

        // Check if an 'id' parameter is provided in the URL (for updating a post)
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];

            // Perform an update query here based on the provided 'id'
            $title = $_POST['title'];
            $content = $_POST['post_text'];

            // You should use prepared statements to avoid SQL injection
            $stmt = $conn->prepare("UPDATE post SET title=?, content=?, date=? WHERE id=?");
            $stmt->bind_param("sssi", $title, $content, $date, $id);

            if ($stmt->execute()) {
                echo 'Successfully updated';
            } else {
                echo 'Problem in query: ' . $stmt->error;
            }

            $stmt->close();
        } else {
            // Insert the post data into the database (for creating a new post)
            $title = $_POST['title'];
            $content = $_POST['post_text'];
            $status = 'publish';

            // You should use prepared statements to avoid SQL injection
            $stmt = $conn->prepare("INSERT INTO post (title, content, date, status) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $title, $content, $date, $status);

            if ($stmt->execute()) {
                echo 'Successfully done';
            } else {
                echo 'Problem in query: ' . $stmt->error;
            }

            $stmt->close();
        }

        $conn->close();
    } else {
        echo 'Please fill all the boxes';
    }
}
?> 