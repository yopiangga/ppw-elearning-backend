<?php
include('./../../config/connection.php');

$menuActive = 'addLecturer';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telp = $_POST['telephone'];
    $fullName = $_POST['fullName'];
    $nickName = $_POST['nickName'];
    $university = $_POST['university'];
    $fields = $_POST['fields'];
    $placeBirth = $_POST['placeBirth'];
    $dateBirth = $_POST['dateBirth'];
    $gender = $_POST['gender'];
    $zipCode = $_POST['zipCode'];
    $address = $_POST['address'];

    $sql = "INSERT INTO lecturer (email, password, telp, fullName, nickName, university, fields, placeBirth, dateBirth, gender, zipCode, address) 
VALUES ('$email', '$password', '$telp', '$fullName', '$nickName', '$university', '$fields', '$placeBirth', '$dateBirth', '$gender', '$zipCode', '$address')";
    $query = mysqli_query($conn, $sql);

    if($query){
        header('Location: ./read-lecturer.php');
    }
}

?>

<?php include('./../template/header.php') ?>

<body id="page-top">

    <div id="wrapper">

        <?php include('./../template/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include('./../template/navbar.php') ?>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Lecturer</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input type="text" class="form-control" name="telephone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password1">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input type="password" class="form-control" name="password2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="fullName">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Nick Name</label>
                                            <input type="text" class="form-control" name="nickName">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>University</label>
                                            <input type="text" class="form-control" name="university">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Fields</label>
                                            <input type="text" class="form-control" name="fields">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Place Birth</label>
                                            <input type="" class="form-control" name="placeBirth">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Date Birth</label>
                                            <input type="date" class="form-control" name="dateBirth">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select type="text" class="form-control" name="gender">
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input type="number" class="form-control" name="zipCode">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea type="text" class="form-control" name="address"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>


                </div>

            </div>

            <?php include('./../template/footer.php') ?>