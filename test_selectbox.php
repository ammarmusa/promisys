<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
?>
    <?php if ($_SESSION['role'] == 'admin') { ?>

        <?php
        $user = $_SESSION['username'];

        //index.php
        $query = "
    SELECT staff_initial, staff_name FROM staff
    ORDER BY staff_name ASC
";

        $result = $conn->query($query);



        ?>

        <div class="row">
            <div class="col-md-3">&nbsp;</div>
            <div class="col-md-6">
                <select name="select_box" class="form-select" id="select_box">
                    <option value="">Select Staff</option>
                    <?php
                    foreach ($result as $row) {
                        echo '<option value="' . $row["staff_initial"] . '">' . $row["staff_initial"] . '-' . $row["staff_name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>

        <?php
        $branch = 'HQ';
        if (isset($_POST['test'])) {
            $date = $_POST['date'];
            $year = date("Y", strtotime($date));
            $year2 = date("y", strtotime($date));
            // print_r($_POST);
            // echo $year2;
            $query = "select * from quotation where year(quot_app_date) = '$year' order by quot_no_inc desc";
            $result = mysqli_query($conn, $query);
            if ($branch == "HQ") {
                $code = "";
            } else if ($branch == "Pahang") {
                $code = "(P)";
            } else {
                $code = "(J)";
            }
            if (mysqli_num_rows($result) == 0) {
                echo '';
            } else {
                $row = mysqli_fetch_array($result);
                $lastid = $row['quot_no'];
                // echo $lastid;
            }
            if (empty($lastid)) {
                $number = "SGS" . $code . "." . $year2 . "Q001";
                $id = '001';
            } else {
                $idd = str_replace("SGS" . $code . ".21Q", "", $lastid);
                $idd = substr($lastid, 10);
                // echo $idd;
                $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
                $number = "SGS" . $code . "." . $year2 . "Q" . $id;
            }
            echo $number;
        }

        ?>

        <form action="" method="post">
            <input type="date" name="date" id="">
            <button type="submit" name="test">Send</button>
        </form>

        <script>
            var select_box_element = document.querySelector('#select_box');

            dselect(select_box_element, {
                search: true
            });

            var name = '<?php echo $user ?>'
            console.log(name)
        </script>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>