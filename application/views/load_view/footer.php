
<?php if ($this->uri->segment(2)=='print_card' || $this->uri->segment(2)=='cetak_peminjaman') { ?>
</section>
  </body>
  <script>window.print();</script>
  <script>
  function OpenInNewTab(){ 
    var win = window.open('<?php if ($this->uri->segment(2)=='print_card') {
      echo base_url('anggota');
    }elseif ($this->uri->segment(2)=='cetak_peminjaman') {
      echo base_url('transaksi/peminjaman');
    }
    ?>');
    win.focus();
    }
  </script>
<?php }else{ ?>
</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> BETA
        </div>
        <strong>Copyright &copy; 2021-2022 <a href="https://sman1-gadingrejo.sch.id/">SMANDING</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
<?php 
if ($this->uri->segment(1)=='' OR $this->uri->segment(1)=='welcome') { ?>
    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/') ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?=base_url('assets/') ?>plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=base_url('assets/') ?>plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?=base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?=base_url('assets/') ?>plugins/knob/jquery.knob.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?=base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?=base_url('assets/') ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/') ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/') ?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/') ?>dist/js/demo.js"></script>
    <?php if ($this->session->userdata('level')=='Administrator') { ?>
      <!-- ChartJS 1.0.1 -->
    <script src="<?=base_url('assets/') ?>plugins/chartjs/Chart.min.js"></script>
    <script type="text/javascript">
      $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
          labels: [
          <?php
                foreach ($chart as $data) {
                  echo "'" .longdate_indo($data['tanggal']) ."',";
                }
              ?>
              ],
          datasets: [
            {
              label: "Jumlah Kunjungan",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [<?php
                foreach ($chart as $data) {
                  echo "'" .$data['jumlah'] ."',";
                }
              ?>]
            }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };

        //Create the line chart

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var areaChartData2 = {
          labels: [
          <?php
                foreach ($chart_tr as $data) {
                  echo "'" .longdate_indo($data['tanggal']) ."',";
                }
              ?>
              ],
          datasets: [
            {
              label: "Jumlah Transaksi",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [<?php
                foreach ($chart_tr as $data) {
                  echo "'" .$data['jumlah'] ."',";
                }
              ?>]
            }
          ]
        };
        areaChart.Line(areaChartData2, areaChartOptions);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
          <?php
          if ($buku >= 10) { ?>
            {
            value: <?=$chart_buku[0]['dipinjam'] ?>,
            color: "#00FFFF",
            highlight: "#00FFFF",
            label: "<?=$chart_buku[0]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[1]['dipinjam'] ?>,
            color: "#f56954",
            highlight: "#f56954",
            label: "<?=$chart_buku[1]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[2]['dipinjam'] ?>,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "<?=$chart_buku[2]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[3]['dipinjam'] ?>,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "<?=$chart_buku[3]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[4]['dipinjam'] ?>,
            color: "#00c0ef",
            highlight: "#00c0ef",
            label: "<?=$chart_buku[4]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[5]['dipinjam'] ?>,
            color: "#3c8dbc",
            highlight: "#3c8dbc",
            label: "<?=$chart_buku[5]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[6]['dipinjam'] ?>,
            color: "#bf6fb6",
            highlight: "#bf6fb6",
            label: "<?=$chart_buku[6]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[7]['dipinjam'] ?>,
            color: "#D2691E",
            highlight: "#D2691E",
            label: "<?=$chart_buku[7]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[8]['dipinjam'] ?>,
            color: "#8a65a6",
            highlight: "#8a65a6",
            label: "<?=$chart_buku[8]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[9]['dipinjam'] ?>,
            color: "#d2d6de",
            highlight: "#d2d6de",
            label: "<?=$chart_buku[9]['judul_buku'] ?>"
          }
          <?php }elseif($buku == 9) { ?>
            {
            value: <?=$chart_buku[0]['dipinjam'] ?>,
            color: "#00FFFF",
            highlight: "#00FFFF",
            label: "<?=$chart_buku[0]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[1]['dipinjam'] ?>,
            color: "#f56954",
            highlight: "#f56954",
            label: "<?=$chart_buku[1]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[2]['dipinjam'] ?>,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "<?=$chart_buku[2]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[3]['dipinjam'] ?>,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "<?=$chart_buku[3]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[4]['dipinjam'] ?>,
            color: "#00c0ef",
            highlight: "#00c0ef",
            label: "<?=$chart_buku[4]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[5]['dipinjam'] ?>,
            color: "#3c8dbc",
            highlight: "#3c8dbc",
            label: "<?=$chart_buku[5]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[6]['dipinjam'] ?>,
            color: "#bf6fb6",
            highlight: "#bf6fb6",
            label: "<?=$chart_buku[6]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[7]['dipinjam'] ?>,
            color: "#D2691E",
            highlight: "#D2691E",
            label: "<?=$chart_buku[7]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[8]['dipinjam'] ?>,
            color: "#8a65a6",
            highlight: "#8a65a6",
            label: "<?=$chart_buku[8]['judul_buku'] ?>"
          }
          <?php 
          }elseif ($buku == 8) { ?>
            {
            value: <?=$chart_buku[0]['dipinjam'] ?>,
            color: "#00FFFF",
            highlight: "#00FFFF",
            label: "<?=$chart_buku[0]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[1]['dipinjam'] ?>,
            color: "#f56954",
            highlight: "#f56954",
            label: "<?=$chart_buku[1]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[2]['dipinjam'] ?>,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "<?=$chart_buku[2]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[3]['dipinjam'] ?>,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "<?=$chart_buku[3]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[4]['dipinjam'] ?>,
            color: "#00c0ef",
            highlight: "#00c0ef",
            label: "<?=$chart_buku[4]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[5]['dipinjam'] ?>,
            color: "#3c8dbc",
            highlight: "#3c8dbc",
            label: "<?=$chart_buku[5]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[6]['dipinjam'] ?>,
            color: "#bf6fb6",
            highlight: "#bf6fb6",
            label: "<?=$chart_buku[6]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[7]['dipinjam'] ?>,
            color: "#D2691E",
            highlight: "#D2691E",
            label: "<?=$chart_buku[7]['judul_buku'] ?>"
          }
          <?php 
          }elseif ($buku == 7) { ?>
            {
            value: <?=$chart_buku[0]['dipinjam'] ?>,
            color: "#00FFFF",
            highlight: "#00FFFF",
            label: "<?=$chart_buku[0]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[1]['dipinjam'] ?>,
            color: "#f56954",
            highlight: "#f56954",
            label: "<?=$chart_buku[1]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[2]['dipinjam'] ?>,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "<?=$chart_buku[2]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[3]['dipinjam'] ?>,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "<?=$chart_buku[3]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[4]['dipinjam'] ?>,
            color: "#00c0ef",
            highlight: "#00c0ef",
            label: "<?=$chart_buku[4]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[5]['dipinjam'] ?>,
            color: "#3c8dbc",
            highlight: "#3c8dbc",
            label: "<?=$chart_buku[5]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[6]['dipinjam'] ?>,
            color: "#bf6fb6",
            highlight: "#bf6fb6",
            label: "<?=$chart_buku[6]['judul_buku'] ?>"
          }
          <?php 
          }elseif ($buku == 6) { ?>
            {
            value: <?=$chart_buku[0]['dipinjam'] ?>,
            color: "#00FFFF",
            highlight: "#00FFFF",
            label: "<?=$chart_buku[0]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[1]['dipinjam'] ?>,
            color: "#f56954",
            highlight: "#f56954",
            label: "<?=$chart_buku[1]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[2]['dipinjam'] ?>,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "<?=$chart_buku[2]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[3]['dipinjam'] ?>,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "<?=$chart_buku[3]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[4]['dipinjam'] ?>,
            color: "#00c0ef",
            highlight: "#00c0ef",
            label: "<?=$chart_buku[4]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[5]['dipinjam'] ?>,
            color: "#3c8dbc",
            highlight: "#3c8dbc",
            label: "<?=$chart_buku[5]['judul_buku'] ?>"
          }
          <?php 
          }elseif ($buku == 5) { ?>
            {
            value: <?=$chart_buku[0]['dipinjam'] ?>,
            color: "#00FFFF",
            highlight: "#00FFFF",
            label: "<?=$chart_buku[0]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[1]['dipinjam'] ?>,
            color: "#f56954",
            highlight: "#f56954",
            label: "<?=$chart_buku[1]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[2]['dipinjam'] ?>,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "<?=$chart_buku[2]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[3]['dipinjam'] ?>,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "<?=$chart_buku[3]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[4]['dipinjam'] ?>,
            color: "#00c0ef",
            highlight: "#00c0ef",
            label: "<?=$chart_buku[4]['judul_buku'] ?>"
          }
          <?php 
          }elseif ($buku == 4) { ?>
            {
            value: <?=$chart_buku[0]['dipinjam'] ?>,
            color: "#00FFFF",
            highlight: "#00FFFF",
            label: "<?=$chart_buku[0]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[1]['dipinjam'] ?>,
            color: "#f56954",
            highlight: "#f56954",
            label: "<?=$chart_buku[1]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[2]['dipinjam'] ?>,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "<?=$chart_buku[2]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[3]['dipinjam'] ?>,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "<?=$chart_buku[3]['judul_buku'] ?>"
          }
          <?php 
          }elseif ($buku == 3) { ?>
            {
            value: <?=$chart_buku[0]['dipinjam'] ?>,
            color: "#00FFFF",
            highlight: "#00FFFF",
            label: "<?=$chart_buku[0]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[1]['dipinjam'] ?>,
            color: "#f56954",
            highlight: "#f56954",
            label: "<?=$chart_buku[1]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[2]['dipinjam'] ?>,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "<?=$chart_buku[2]['judul_buku'] ?>"
          }
          <?php 
          }elseif ($buku == 2) { ?>
            {
            value: <?=$chart_buku[0]['dipinjam'] ?>,
            color: "#00FFFF",
            highlight: "#00FFFF",
            label: "<?=$chart_buku[0]['judul_buku'] ?>"
          },
          {
            value: <?=$chart_buku[1]['dipinjam'] ?>,
            color: "#f56954",
            highlight: "#f56954",
            label: "<?=$chart_buku[1]['judul_buku'] ?>"
          }
          <?php 
          }elseif ($buku == 1) { ?>
            {
            value: <?=$chart_buku[0]['dipinjam'] ?>,
            color: "#00FFFF",
            highlight: "#00FFFF",
            label: "<?=$chart_buku[0]['judul_buku'] ?>"
          }
          <?php 
          }elseif ($buku == 0) {
            echo "Belum ada data";
          }
          ?>

        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#anggotaChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var AnggotaData = [
          {
            value: <?=$pria ?>,
            color: "red",
            highlight: "red",
            label: "Laki-laki"
          },
          {
            value: <?=$wanita?>,
            color: "#8B008B",
            highlight: "#8B008B",
            label: "Perempuan"
          }

        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(AnggotaData, pieOptions);
      });
 
    </script>
    <?php }else{

    } ?>

<?php 
} elseif($this->uri->segment(1)=='rak'){ ?>
    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/') ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/') ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url('assets/') ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/') ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/') ?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/') ?>dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 4 ] }
       ]
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
<?php 
}elseif ($this->uri->segment(1)=='buku' || $this->uri->segment(2)=='buku') { ?>
  <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/') ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/') ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url('assets/') ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/') ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/') ?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/') ?>dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ <?php if ($this->session->userdata('level')=='Administrator') { echo "8";
        }else{
          echo "";
        } ?> ] }
       ]
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
<?php
}elseif ($this->uri->segment(1)=='anggota') { ?>
  <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/') ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/') ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url('assets/') ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/') ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/') ?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/') ?>dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 6 ] }
       ]
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
<?php
}elseif ($this->uri->segment(1)=='transaksi' || $this->uri->segment(2)=='history') { ?>
  <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/') ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/') ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url('assets/') ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/') ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/') ?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/') ?>dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ <?php if ($this->session->userdata('level')=='Administrator') { echo "6";
        }else{
          echo "";
        } ?> ] }
       ]
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <!-- Select2 -->
    <script src="<?=base_url('assets/') ?>plugins/select2/select2.full.min.js"></script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
      });
    </script>
<?php
}elseif ($this->uri->segment(1) == 'kunjungan') { ?>
  <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/') ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/') ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url('assets/') ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/') ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/') ?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/') ?>dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 4 ] }
       ]
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
<?php }elseif ($this->uri->segment(1)=='profile') { ?>
  <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/') ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?=base_url('assets/') ?>plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=base_url('assets/') ?>plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?=base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?=base_url('assets/') ?>plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="<?=base_url('assets/') ?>https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?=base_url('assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?=base_url('assets/') ?>plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?=base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?=base_url('assets/') ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/') ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/') ?>dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?=base_url('assets/') ?>dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/') ?>dist/js/demo.js"></script>
    <!-- Chart JS -->
    <script src="<?=base_url('assets/') ?>chart-js/dist/Chart.js"></script>
<?php } ?>
  </body>
</html>
<?php } ?>
