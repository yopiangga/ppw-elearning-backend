<?php
include('./../../config/connection.php');

$sql = "SELECT * from assignment";
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
                        <h1 class="h3 mb-0 text-gray-800">All Assignment</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Class</th>
                                            <th>Description</th>
                                            <th>Min Rate</th>
                                            <th>Max Rate</th>
                                            <th>Due Time</th>
                                            <th>Due Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Class</th>
                                            <th>Description</th>
                                            <th>Min Rate</th>
                                            <th>Max Rate</th>
                                            <th>Due Time</th>
                                            <th>Due Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $i = 1;
                                        while ($assignment = mysqli_fetch_array($query)) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $assignment['title'] ?></td>
                                            <td><?= $assignment['classId'] ?></td>
                                            <td><?= $assignment['description'] ?></td>
                                            <td><?= $assignment['minRate'] ?></td>
                                            <td><?= $assignment['maxRate'] ?></td>
                                            <td><?= $assignment['dueTime'] ?></td>
                                            <td><?= $assignment['dueDate'] ?></td>
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

 