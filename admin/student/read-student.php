<?php
include('./../../config/connection.php');

$menuActive = 'readStudent';

$sql = "SELECT * from mahasiswa";
$query = mysqli_query($conn, $sql);

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
                        <h1 class="h3 mb-0 text-gray-800">Students</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Full Name</th>
                                            <th>Nick Name</th>
                                            <th>University</th>
                                            <th>Fields</th>
                                            <th>Place Birth</th>
                                            <th>Date Birth</th>
                                            <th>Gender</th>
                                            <th>Zip Code</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Full Name</th>
                                            <th>Nick Name</th>
                                            <th>University</th>
                                            <th>Fields</th>
                                            <th>Place Birth</th>
                                            <th>Date Birth</th>
                                            <th>Gender</th>
                                            <th>Zip Code</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $i = 1;
                                        while ($mahasiswa = mysqli_fetch_array($query)) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $mahasiswa['email'] ?></td>
                                            <td><?= $mahasiswa['telp'] ?></td>
                                            <td><?= $mahasiswa['fullName'] ?></td>
                                            <td><?= $mahasiswa['nickName'] ?></td>
                                            <td><?= $mahasiswa['university'] ?></td>
                                            <td><?= $mahasiswa['fields'] ?></td>
                                            <td><?= $mahasiswa['placeBirth'] ?></td>
                                            <td><?= $mahasiswa['dateBirth'] ?></td>
                                            <td><?= $mahasiswa['gender'] ?></td>
                                            <td><?= $mahasiswa['zipCode'] ?></td>
                                            <td><?= $mahasiswa['address'] ?></td>
                                            <td>
                                                <a href="./delete-student.php?id=<?=$mahasiswa['id']?>" class="badge badge-danger">Delete</a>
                                                <a href="./edit-student.php?id=<?=$mahasiswa['id']?>" class="badge badge-warning">Edit</a>
                                            </td>
                                        </tr>
                                        
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <?php include('./../template/footer.php') ?>
