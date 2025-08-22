<?php
session_start();
include("../database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES['image'])) {
    // Handle the uploaded file
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];
    $image_error = $image['error'];

    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];

    // Get the last name by splitting the student name
    $name_parts = explode(" ", $student_name); // Split by spaces
    $lastName = strtoupper(array_pop($name_parts));

    if ($image_error === 0) {
        // Check file type (optional)
        $file_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $allowed_exts = ["jpg", "jpeg", "png"];
        if (in_array($file_ext, $allowed_exts)) {
            // Generate a unique name for the new image
            $image_new_name = $student_id . "-" . $lastName . "." . $file_ext;
            $image_destination = "../../assets/images/studentImages/" . $image_new_name;

            // Check and delete the old image, if it is not the default image
            $old_image_query = "SELECT student_photo FROM student_data WHERE student_id = '$student_id'";
            $old_image_result = mysqli_query($con, $old_image_query);
            if ($old_image_result && mysqli_num_rows($old_image_result) > 0) {
                $old_image = mysqli_fetch_assoc($old_image_result)['student_photo'];

                // Only delete old image if it is not the default image
                if ($old_image && $old_image !== "default-profile.png" && file_exists("../../assets/images/studentImages/" . $old_image)) {
                    unlink("../../assets/images/studentImages/" . $old_image);
                }
            }

            // Move the uploaded file to the destination folder
            if (move_uploaded_file($image_tmp_name, $image_destination)) {
                // Update the database with the new image URL
                $update_query = "UPDATE student_data SET student_photo = '$image_new_name' WHERE student_id = '$student_id'";
                $update_result = mysqli_query($con, $update_query);

                if ($update_result) {
                    $data["status"] = "success";
                    $data["message"] = "Profile image updated successfully.";
                    $data["new_image_url"] = "../../assets/images/studentImages/" . $image_new_name;
                } else {
                    $data["status"] = "error";
                    $data["message"] = "Error updating the profile image in the database.";
                }
            } else {
                $data["status"] = "error";
                $data["message"] = "Error uploading the image.";
            }
        } else {
            $data["status"] = "error";
            $data["message"] = "Invalid file type. Only JPG, JPEG, and PNG files are allowed.";
        }
    } else {
        $data["status"] = "error";
        $data["message"] = "Error uploading the image.";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method or missing image.";
}

echo json_encode($data);
?>