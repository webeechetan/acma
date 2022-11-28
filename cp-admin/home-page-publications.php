<?php
$conn = mysqli_connect("localhost", "techtonic", "d#4ab01db3!bT", "acma_web");

if (isset($_POST['ids']) && isset($_POST['type']) == 'slide') {
    if ($_POST['type'] == 'slide') {
        $ids = $_POST['ids'];
        $ids = explode(',', $ids);
        print_r($ids);
        for ($i = 1; $i <= count($ids); $i++) {
            $id = $ids[$i - 1];
            $sql = "UPDATE home_page_slides SET image_order='$i' WHERE id='$id'";
            $res = mysqli_query($conn, $sql);
        }
        die();
    }
}

if (isset($_POST['ids']) && isset($_POST['type'])) {
    if ($_POST['type'] == 'event') {
        $ids = $_POST['ids'];
        $ids = explode(',', $ids);
        for ($i = 1; $i <= count($ids); $i++) {
            $id = $ids[$i - 1];
            $sql = "UPDATE home_page_events SET image_order='$i' WHERE id='$id'";
            $res = mysqli_query($conn, $sql);
        }
        die();
    }
}

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    if ($type == 'slide') {
        $query = mysqli_query($conn, "DELETE FROM home_page_slides WHERE id = '$id'");
        if ($query) {
            header('location:home-page-publications.php');
        }
    }
    if ($type == 'event') {
        $query = mysqli_query($conn, "DELETE FROM home_page_events WHERE id = '$id'");
        if ($query) {
            header('location:home-page-publications.php');
        }
    }
}
include("header.php");

session_start();


// Check connection

if (mysqli_connect_errno()) {

    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$_SESSION['msg'] = $_SESSION['msg'] = "";

if (isset($_POST['save_slide'])) {
    $slide_image = $_FILES['slide_image']['name'];
    $slide_image_tmp = $_FILES['slide_image']['tmp_name'];
    $slide_url = $_POST['slide_url'];
    $slide_image = rand(000000, 99999) . '-slide-' . $slide_image;
    $order = mysqli_query($conn, "SELECT * FROM home_page_slides");
    $order = mysqli_num_rows($order) + 1;
    if (move_uploaded_file($slide_image_tmp, '../images/' . $slide_image)) {
        $sql = "INSERT INTO home_page_slides (image,image_url,image_order) VALUES ('$slide_image','$slide_url','$order')";
        $query = mysqli_query($conn, $sql);
    }
}

if (isset($_POST['update_slide'])) {
    $id = $_POST['slide_id'];
    $slide_url = $_POST['slide_url'];
    if (isset($_FILES['slide_image']) && !empty($_FILES['slide_image']['name'])) {
        $slide_image = $_FILES['slide_image']['name'];
        $slide_image_tmp = $_FILES['slide_image']['tmp_name'];
        $slide_image = rand(000000, 99999) . '-slide-' . $slide_image;
        move_uploaded_file($slide_image_tmp, '../images/' . $slide_image);
        $sql = "UPDATE home_page_slides SET image='$slide_image',image_url='$slide_url' WHERE id='$id'";
    } else {
        $sql = "UPDATE home_page_slides SET image_url='$slide_url' WHERE id='$id'";
    }
    $query = mysqli_query($conn, $sql);
}

if (isset($_POST['update_event'])) {
    $id = $_POST['event_id'];
    $slide_url = $_POST['slide_url'];
    if (isset($_FILES['slide_image']) && !empty($_FILES['slide_image']['name'])) {
        $slide_image = $_FILES['slide_image']['name'];
        $slide_image_tmp = $_FILES['slide_image']['tmp_name'];
        $slide_image = rand(000000, 99999) . '-slide-' . $slide_image;
        move_uploaded_file($slide_image_tmp, '../images/' . $slide_image);
        $sql = "UPDATE home_page_events SET image='$slide_image',image_url='$slide_url' WHERE id='$id'";
    } else {
        $sql = "UPDATE home_page_events SET image_url='$slide_url' WHERE id='$id'";
    }
    $query = mysqli_query($conn, $sql);
}


if (isset($_POST['save_event'])) {
    $slide_image = $_FILES['slide_image']['name'];
    $slide_image_tmp = $_FILES['slide_image']['tmp_name'];
    $slide_url = $_POST['slide_url'];
    $slide_image = rand(000000, 99999) . '-slide-' . $slide_image;
    $order = mysqli_query($conn, "SELECT * FROM home_page_slides");
    $order = mysqli_num_rows($order) + 1;
    if (move_uploaded_file($slide_image_tmp, '../images/' . $slide_image)) {
        $sql = "INSERT INTO home_page_events (image,image_url,image_order) VALUES ('$slide_image','$slide_url','$order')";
        $query = mysqli_query($conn, $sql);
    }
}
?>

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget widget-nopad">

                        <?php if ($_SESSION['msg']) {

                            echo $_SESSION['msg'];
                        } elseif ($_SESSION['msgErr']) {

                            echo $_SESSION['msgErr'];
                        }



                        ?>

                        <div class="widget-header"> <i class="icon-list-alt"></i>
                            <h3>Documents</h3>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#slideModal">
                                Add Slide
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal">
                                Add Upcoming Event
                            </button>
                        </div>
                        <h1 style="text-align:center">Slides</h1>
                        <div class="col-md-6">
                            <table class="table nowrap">
                                <thead>
                                    <tr>

                                        <th>Sr no</th>

                                        <th>Image</th>

                                        <th>URL</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody id="sortable">

                                    <?php $sql = "SELECT * FROM home_page_slides ORDER BY image_order ASC";

                                    $row = mysqli_query($conn, $sql);

                                    $srno = 1;

                                    while ($result = mysqli_fetch_assoc($row)) { ?>
                                        <tr data-id="<?php echo $result['id'] ?>">

                                            <td><?php echo $srno; ?></td>

                                            <td><img src="../images/<?php echo $result['image'] ?>" height="100px" width="170px" class="img-thumbnail"></td>

                                            <td><?php echo $result['image_url'] ?></td>

                                            <td>
                                                <a href="?id=<?php echo $result['id'] ?>&type=slide">
                                                    <button class=" btn btn-danger">Delete</button>
                                                </a>
                                                <a href="javascript:void(0)" class="edit_slide" data-id="<?php echo $result['id'] ?>" data-image="<?php echo $result['image'] ?>" data-image_url="<?php echo $result['image_url'] ?>">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php $srno++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <h1 style="text-align:center">Events</h1>
                        <div class="col-md-6">
                            <table class="table nowrap">
                                <thead>
                                    <tr>

                                        <th>Sr no</th>

                                        <th>Image</th>

                                        <th>URL</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody id="sortable2">

                                    <?php $sql = "SELECT * FROM home_page_events ORDER BY image_order ASC";

                                    $row = mysqli_query($conn, $sql);

                                    $srno = 1;

                                    while ($result = mysqli_fetch_assoc($row)) { ?>
                                        <tr data-id="<?php echo $result['id'] ?>">

                                            <td><?php echo $srno; ?></td>

                                            <td><img src="../images/<?php echo $result['image'] ?>" height="100px" width="170px" class="img-thumbnail"></td>

                                            <td><?php echo $result['image_url'] ?></td>

                                            <td>
                                                <a href="?id=<?php echo $result['id'] ?>&type=event">
                                                    <button class=" btn btn-danger">Delete</button>
                                                </a>
                                                <a href="javascript:void(0)" class="edit_event" data-id="<?php echo $result['id'] ?>" data-image="<?php echo $result['image'] ?>" data-image_url="<?php echo $result['image_url'] ?>">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php $srno++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /span6 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->
<!-- Slide Modal -->
<div class="modal fade" id="slideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Slide</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Slide</label>
                        <input type="file" required accept="image/*" name="slide_image" class="form-control" id="slide">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Url</label>
                        <input type="text" name="slide_url" class="form-control" id="slide_url">
                    </div>
                    <input type="hidden" name="save_slide">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Slide Modal -->

<div class="modal fade" id="editSlideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Slide</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Slide</label>
                        <input type="file" accept="image/*" name="slide_image" class="form-control" id="edit_slide">
                        <img src="" id="slide_image" height="100" width="100" alt="" />
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Url</label>
                        <input type="text" name="slide_url" class="form-control" id="edit_slide_url">
                    </div>
                    <input type="hidden" name="slide_id" id="slide_id">
                    <input type="hidden" name="update_slide">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Event Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-dialog" role="document">
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Slide</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Slide</label>
                                    <input type="file" required accept="image/*" name="slide_image" class="form-control" id="slide">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Url</label>
                                    <input type="text" name="slide_url" class="form-control" id="slide_url">
                                </div>
                                <input type="hidden" name="save_event">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Event -->
<div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Event</label>
                        <input type="file" accept="image/*" name="slide_image" class="form-control" id="edit_slide">
                        <img src="" id="event_image" height="100" width="100" alt="" />
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Url</label>
                        <input type="text" name="slide_url" class="form-control" id="event_slide_url">
                    </div>
                    <input type="hidden" name="event_id" id="event_id">
                    <input type="hidden" name="update_event">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript">
    $(function() {
        let ids = '';
        $("#sortable").sortable({
            stop: function(e) {
                ids = '';
                $("#sortable tr").each(function() {
                    if (ids == '') {
                        ids = $(this).data("id");
                    } else {
                        ids += ',' + $(this).data("id");
                    }
                })
                $.post("home-page-publications.php", {
                    ids: ids,
                    type: 'slide'
                }, function(data) {
                    console.log(data)
                })
            },
            start: function(e) {
                // console.log(e)
            }
        });
    });

    $(function() {
        let ids = '';
        $("#sortable2").sortable({
            stop: function(e) {
                ids = '';
                $("#sortable2 tr").each(function() {
                    if (ids == '') {
                        ids = $(this).data("id");
                    } else {
                        ids += ',' + $(this).data("id");
                    }
                })
                $.post("home-page-publications.php", {
                    ids: ids,
                    type: 'event'
                }, function(data) {
                    console.log(data)
                })
            },
            start: function(e) {
                console.log(e)
            }
        });
    });

    // Edit Slide 

    $(".edit_slide").click(function(e) {
        let id = $(this).data("id");
        let image = $(this).data("image");
        let image_url = $(this).data("image_url");
        $("#slide_image").attr("src", '../images/' + image);
        $("#edit_slide_url").val(image_url);
        $("#slide_id").val(id);
        $("#editSlideModal").modal("show");

    })

    // edit event

    $(".edit_event").click(function(e) {
        let id = $(this).data("id");
        let image = $(this).data("image");
        let image_url = $(this).data("image_url");
        $("#event_image").attr("src", '../images/' + image);
        $("#event_slide_url").val(image_url);
        $("#event_id").val(id);
        $("#editEventModal").modal("show");

    })
</script>