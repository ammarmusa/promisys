<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    include "include_header.php";
    include "alert.php";
?>
    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superuser') { ?>

        <?php
        $year = date("Y");
        ?>

        <!-- <form action="" method="post">
            <div class="row mt-3">
                <div class="col-md-4">
                    <select name="year" id="select_year" class="form-control" disabled>
                        <option value="2023">2023</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="sumbit" name="submit">Submit</button>
                </div>
            </div>
        </form> -->

        <!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Quotation</div>
                    <div class="card-body">
                        <canvas style="background-color: white; border-radius:5px" id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Securement</div>
                    <div class="card-body">
                        <canvas style="background-color: white; border-radius:5px" id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 mb-3">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Status Client</div>
                    <div class="card-body">
                        <canvas style="background-color: white; border-radius:5px" id="myChart3"></canvas>
                        <div id="error_3"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Status</div>
                    <div class="card-body">
                        <canvas style="background-color: white; border-radius:5px" id="myChart4"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Type of Client</div>
                    <div class="card-body">
                        <canvas style="background-color: white; border-radius:5px" id="myChart5"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Scope of Work</div>
                    <div class="card-body">
                        <canvas style="background-color: white; border-radius:5px" id="myChart6"></canvas>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="card bg-light mt-3">
            <h5 class="card-header">Notice</h5>
            <div class="card-body">
                <h5 class="card-title">Migrating module.</h5>
                <p class="card-text">Graphs will be moved to a new module (Project Analysis).</p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
        </div>
        <div class="card bg-light mt-3">
            <h5 class="card-header">Notice</h5>
            <div class="card-body">
                <h5 class="card-title">Under development</h5>
                <p class="card-text">Some features might not work properly click the link below to report any problem.</p>
                <a href="inquiry.php" class="btn btn-primary">Inquiry</a>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // var year = "<?php echo $year; ?>"
            // $(function() {
            //     $.ajax({
            //         type: 'GET',
            //         url: 'fetch_2.php',
            //         data: {
            //             "year": year
            //         },
            //         success: function(data) {
            //             if (data === '404') {
            //                 // console.log(data);
            //                 var ctx3 = document.getElementById('error_3')
            //                 ctx3.innerHTML = "No data!";
            //             } else {
            //                 var arr_num = [];
            //                 var arr_qcs = [];
            //                 var newData = JSON.parse(data);
            //                 // console.log(newData);
            //                 for (var a = 0; a < newData.length; a++) {
            //                     var Number = newData[a].Number;
            //                     var client_status = newData[a].quot_client_status;
            //                     // console.log(Number + " " + client_status);
            //                     arr_num.push(Number)
            //                     arr_qcs.push(client_status)

            //                 }
            //                 // console.log(arr_num + " " + arr_qcs);
            //                 // console.log(JSON.parse(data)[0].Number);

            //                 var ctx3 = document.getElementById('myChart3').getContext('2d')
            //                 var myChart3 = new Chart(ctx3, {
            //                     type: 'pie',
            //                     data: {
            //                         labels: arr_qcs,
            //                         datasets: [{
            //                             label: 'Client Status',
            //                             data: arr_num,
            //                             backgroundColor: [
            //                                 'rgba(50, 168, 82)',
            //                                 'rgba(277,70,70)',
            //                                 'rgba(27, 91, 242)',
            //                                 'rgba(252, 231, 40)',
            //                                 'rgba(252, 135, 40)'
            //                             ]
            //                         }]
            //                     },
            //                     options: {}
            //                 })
            //             }

            //         },
            //         error: function() {
            //             console.log("error");
            //             // var error = "No data";
            //             // ctx3.innerHTML = error;
            //         }
            //     });

            //     $.ajax({
            //         type: 'GET',
            //         url: 'fetch_type_client.php',
            //         data: {
            //             "year": year
            //         },
            //         success: function(data) {
            //             if (data === '404') {
            //                 // console.log(data);
            //                 var ctx5 = document.getElementById('error_5')
            //                 ctx5.innerHTML = "No data!";
            //             } else {
            //                 var arr_num_2 = [];
            //                 var arr_qct = [];
            //                 var newData = JSON.parse(data);
            //                 // console.log(newData);
            //                 for (var a = 0; a < newData.length; a++) {
            //                     var Number = newData[a].Number;
            //                     var client_status = newData[a].quot_client_type;
            //                     // console.log(Number + " " + client_status);
            //                     arr_num_2.push(Number)
            //                     arr_qct.push(client_status)

            //                 }
            //                 // console.log(arr_num_2 + " " + arr_qct);
            //                 // console.log(JSON.parse(data)[0].Number);

            //                 var ctx5 = document.getElementById('myChart5').getContext('2d')
            //                 var myChart5 = new Chart(ctx5, {
            //                     type: 'pie',
            //                     data: {
            //                         labels: arr_qct,
            //                         datasets: [{
            //                             label: 'Client Type',
            //                             data: arr_num_2,
            //                             backgroundColor: [
            //                                 'rgba(50, 168, 82)',
            //                                 'rgba(277,70,70)',
            //                                 'rgba(27, 91, 242)',
            //                                 'rgba(252, 231, 40)',
            //                                 'rgba(252, 135, 40)'
            //                             ]
            //                         }]
            //                     },
            //                     options: {}
            //                 })
            //             }

            //         },
            //         error: function() {
            //             console.log("error");
            //             // var error = "No data";
            //             // ctx3.innerHTML = error;
            //         }
            //     });

            //     $.ajax({
            //         type: 'GET',
            //         url: 'fetch_scope_work.php',
            //         data: {
            //             "year": year
            //         },
            //         success: function(data) {
            //             if (data === '404') {
            //                 // console.log(data);
            //                 var ctx6 = document.getElementById('error_6')
            //                 ctx6.innerHTML = "No data!";
            //             } else {
            //                 var arr_num_2 = [];
            //                 var arr_qct = [];
            //                 var newData = JSON.parse(data);
            //                 // console.log(newData);
            //                 for (var a = 0; a < newData.length; a++) {
            //                     var Number = newData[a].Number;
            //                     var client_status = newData[a].quot_work_scope;
            //                     // console.log(Number + " " + client_status);
            //                     arr_num_2.push(Number)
            //                     arr_qct.push(client_status)

            //                 }
            //                 // console.log(arr_num_2 + " " + arr_qct);
            //                 // console.log(JSON.parse(data)[0].Number);

            //                 var ctx6 = document.getElementById('myChart6').getContext('2d')
            //                 var myChart6 = new Chart(ctx6, {
            //                     type: 'pie',
            //                     data: {
            //                         labels: arr_qct,
            //                         datasets: [{
            //                             label: 'Work Scope',
            //                             data: arr_num_2,
            //                             backgroundColor: [
            //                                 'rgba(50, 168, 82)',
            //                                 'rgba(277,70,70)',
            //                                 'rgba(27, 91, 242)',
            //                                 'rgba(252, 231, 40)',
            //                                 'rgba(252, 135, 40)'
            //                             ]
            //                         }]
            //                     },
            //                     options: {}
            //                 })
            //             }

            //         },
            //         error: function() {
            //             console.log("error");
            //             // var error = "No data";
            //             // ctx3.innerHTML = error;
            //         }
            //     });

            //     $.ajax({
            //         type: 'GET',
            //         url: 'fetch_quot_status.php',
            //         data: {
            //             "year": year
            //         },
            //         success: function(data) {
            //             if (data === '404') {
            //                 // console.log(data);
            //                 var ctx4 = document.getElementById('error_4')
            //                 ctx4.innerHTML = "No data!";
            //             } else {
            //                 var arr_num = [];
            //                 var arr_qcs = [];
            //                 var newData = JSON.parse(data);
            //                 // console.log(newData);
            //                 for (var a = 0; a < newData.length; a++) {
            //                     var Number = newData[a].Number;
            //                     var client_status = newData[a].quot_status;

            //                     if (client_status == 'applied') {
            //                         client_status = 'Pending'
            //                     } else if (client_status == 'approved') {
            //                         client_status = 'Success'
            //                     } else {
            //                         client_status = 'Rejected'
            //                     }
            //                     // console.log(Number + " " + client_status);
            //                     arr_num.push(Number)
            //                     arr_qcs.push(client_status)

            //                 }
            //                 // console.log(arr_num + " " + arr_qcs);
            //                 // console.log(JSON.parse(data)[0].Number);

            //                 var ctx4 = document.getElementById('myChart4').getContext('2d')
            //                 var myChart4 = new Chart(ctx4, {
            //                     type: 'pie',
            //                     data: {
            //                         labels: arr_qcs,
            //                         datasets: [{
            //                             label: 'Status',
            //                             data: arr_num,
            //                             backgroundColor: [
            //                                 'rgba(27, 91, 242)',
            //                                 'rgba(50, 168, 82)',
            //                                 'rgba(277,70,70)',
            //                                 'rgba(252, 231, 40)',
            //                                 'rgba(252, 135, 40)'
            //                             ]
            //                         }]
            //                     },
            //                     options: {}
            //                 })
            //             }

            //         },
            //         error: function() {
            //             console.log("error");
            //             // var error = "No data";
            //             // ctx3.innerHTML = error;
            //         }
            //     });
            // });

            // const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Disember']
            // const data = {
            //     labels: labels,
            //     datasets: [{
            //             label: 'Planning',
            //             data: [2500000, 5000000, 7500000, 10000000, 12500000, 15000000, 17500000, 20000000, 22500000, 25000000, 27500000, 30000000],
            //             fill: false,
            //             borderColor: 'rgb(75, 192, 192)',
            //             tension: 0.1
            //         },
            //         {
            //             label: 'Actual',
            //             data: [5037249.81, 5311360.77, 5961666.38, 6030566.38, 6030566.38, 6030566.38, 6030566.38, 6030566.38, 6030566.38, 6030566.38, 6030566.38, 6030566.38],
            //             fill: false,
            //             borderColor: 'rgb(255, 99, 132)',
            //             tension: 0.1
            //         }
            //     ]
            // };
            // const config = {
            //     type: 'line',
            //     data: data,
            // };
            // var myChart = new Chart(
            //     document.getElementById('myChart'),
            //     config
            // )

            // const labels2 = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Disember']
            // const data2 = {
            //     labels: labels2,
            //     datasets: [{
            //             label: 'Planning',
            //             data: [125000, 250000, 375000, 500000, 625000, 750000, 875000, 1000000, 1125000, 1250000, 1375000, 1500000],
            //             fill: false,
            //             borderColor: 'rgb(75, 192, 192)',
            //             tension: 0.1
            //         },
            //         {
            //             label: 'Actual',
            //             data: [0, 0, 31773.50, 76293.50, 76293.50, 76293.50, 76293.50, 76293.50, 76293.50, 76293.50, 76293.50, 76293.50],
            //             fill: false,
            //             borderColor: 'rgb(255, 99, 132)',
            //             tension: 0.1
            //         }
            //     ]
            // };
            // const config2 = {
            //     type: 'line',
            //     data: data2,
            // };
            // var myChart2 = new Chart(
            //     document.getElementById('myChart2'),
            //     config2
            // )
        </script>
    <?php } else { ?>
        <h2>You are not authorized to view this page. Please contact admin for enquiries.</h2>
    <?php } ?>
<?php
    include "include_footer.php";
} else {
    header("Location: login.php");
} ?>