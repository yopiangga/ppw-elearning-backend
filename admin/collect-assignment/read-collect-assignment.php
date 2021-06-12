<?php
include('./../../config/connection.php');

$sql = "SELECT * from collectassignment";
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
                        <h1 class="h3 mb-0 text-gray-800">Collect Assignment</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Assignment</th>
                                            <th>Create At</th>
                                            <th>Update At</th>
                                            <th>ID Student</th>
                                            <th>Rate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Assignment</th>
                                            <th>Create At</th>
                                            <th>Update At</th>
                                            <th>ID Student</th>
                                            <th>Rate</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $i = 1;
                                        while ($collectAss = mysqli_fetch_array($query)) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $collectAss['idAssignment'] ?></td>
                                            <td><?= $collectAss['createAt'] ?></td>
                                            <td><?= $collectAss['uodateAt'] ?></td>
                                            <td><?= $collectAss['idStudent'] ?></td>
                                            <td><?= $collectAss['rate'] ?></td>
                                            <td>
                                                <a href="" class="badge badge-danger">Delete</a>
                                                <a href="" class="badge badge-warning">Edit</a>
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

 