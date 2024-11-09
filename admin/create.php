<?php
require_once '../login/dbh.inc.php'; // DATABASE CONNECTION
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../login/login.php");
    exit();
}

//Get info from admin session
$user = $_SESSION['user'];
$admin_id = $_SESSION['user']['admin_id'];
$first_name = $_SESSION['user']['first_name'];
$last_name = $_SESSION['user']['last_name'];
$email = $_SESSION['user']['email'];
$contact_number = $_SESSION['user']['contact_number'];
$department_id = $_SESSION['user']['department_id'];
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- head CDN links -->
    <?php include '../cdn/head.html'; ?>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/modals.css">
    <link rel="stylesheet" href="css/create.css">
</head>

<body>
    <header>
        <?php include '../cdn/navbar.php'; ?>
        <nav class="navbar nav-bottom fixed-bottom d-block d-md-none mt-5">
            <div class="container-fluid justify-content-around">
                <a href="admin.php" class="btn nav-bottom-btn">
                    <i class="bi bi-house"></i>
                    <span class="icon-label">Home</span>
                </a>

                <a class="btn nav-bottom-btn" href="manage.php">
                    <i class="bi bi-kanban"></i>
                    <span class="icon-label">Manage</span>
                </a>

                <a class="btn nav-bottom-btn active" href="create.php">
                    <i class="bi bi-megaphone"></i>
                    <span class="icon-label">Create</span>
                </a>

                <a class="btn nav-bottom-btn" href="#">
                    <i class="bi bi-clipboard"></i>
                    <span class="icon-label">Logs</span>
                </a>

                <a class="btn nav-bottom-btn" href="manage_student.php">
                    <i class="bi bi-person-plus"></i>
                    <span class="icon-label">Students</span>
                </a>

            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid pt-5">
            <div class="row g-4">
                <!-- left sidebar -->
                <?php include '../cdn/sidebar.php'; ?>

                <!-- main content -->
                <div class="col-md-8 pt-5 px-5">
                    <h3 class="text-center"><b>Create Announcement</b></h3>
                    <div class="form-container d-flex justify-content-center">
                        <form action="upload.php" method="POST" enctype="multipart/form-data">
                            <input type="text" id="admin_id" name="admin_id" value="<?php echo $admin_id; ?>" style="display: none;">

                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control title py-3 px-3" id="title" name="title" placeholder="Enter title" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control custom-class py-3 px-3" id="description" name="description" rows="5" placeholder="Enter description" required style="border-radius: 20px;"></textarea>
                            </div>


                            <?php include 'tag-modal.php' ?>


                            <div class="form-group mb-3">
                                <div class="upload-image-container d-flex flex-column align-items-center justify-content-center bg-white image-preview-container">
                                    <div class="d-flex">
                                        <p id="upload-text" class="mt-3">Upload Photo</p>
                                        <input type="file" class="form-control-file" id="image" name="image" style="display: none;" onchange="imagePreview()">
                                        <button class="btn btn-light" id="file-upload-btn">
                                            <i class="bi bi-upload"></i>
                                        </button>
                                        <img class="img-fluid" id="image-preview" src="#" alt="Image Preview" style="display: none; max-width: 100%; position: relative; z-index: 1;">
                                    </div>
                                    <div class="blur-background" style="display: none;"></div>
                                    <i id="delete-icon" class="bi bi-trash" style="position: absolute; top: 5px; right: 5px; display: none; cursor: pointer;" onclick="deleteImage()"></i>
                                </div>
                            </div>

                            <div class="button-container d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-3 mb-3">Post</button>
                            </div>
                        </form>
                    </div>

                </div>
                <script src="create.js"></script>
            </div>
        </div>
    </main>
    <!-- Body CDN links -->
    <?php include '../cdn/body.html'; ?>
</body>

</html>