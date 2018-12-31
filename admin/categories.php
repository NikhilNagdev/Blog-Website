<?php

    $page_title = "Dashboard";

?>
<!DOCTYPE html>
<html lang="en">

<?php
include_once ("includes/header.php");
?>

<body id="page-top" class="sidebar-toggled">

<?php
include_once ("includes/navigation.php");
?>

<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once ("includes/sidebar.php");
    ?>
    <!-- End of Sidebar -->

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">CMD Admin</a>
                </li>
                <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
            <!-- End of Breadcrumbs-->

            <!-- Main page content-->
            <div class="row">
                <div class="col-md-6">
                    <?php
                        include_once ("pages/categories/add-category-form.php");
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    include_once ("pages/categories/edit-category-form.php");
                    ?>
                </div>
            </div>

            <?php
                include_once ("pages/categories/view-all-categories.php");
            ?>

            <!--End of  Main page content-->

        </div>
        <!-- /.container-fluid -->

        <?php
        include_once("includes/footer.php");
        ?>

    </div>
    <!-- End of content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include_once ("includes/scripts_btn_to_top.php");
?>

</body>

</html>
