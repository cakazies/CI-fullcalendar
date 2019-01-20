

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CI-Fullcalendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Rambling Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />

    <!-- Custom Theme files -->

	<link href="<?php echo base_url()?>assets/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>assets/css/menufullpage.css" rel="stylesheet">
    <!-- font-awesome icons -->
	<!-- js -->
    <script src="<?php echo base_url()?>assets/js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <script type="text/javascript">
      var base_url = '<?php echo base_url(); ?>';
    </script>
	<link href='<?php echo base_url()?>assets/plugins/fullcalendar/css/fullcalendar.min.css' rel='stylesheet' />
	<link href='<?php echo base_url()?>assets/plugins/fullcalendar/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='<?php echo base_url()?>assets/plugins/fullcalendar/js/moment.min.js'></script>
	<script src='<?php echo base_url()?>assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>

	<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      dayClick: function(date,calEvent, jsEvent, view) {
        var da_id = $("#da_id").val();
        $('#cek_calendar').load(base_url+"home/cektoday/"+date.format()+"/"+da_id);
        $('#perday').modal('show');
        // alert('Event: ' + date.format()+" "+da_id);
      },
      header: {
        left: 'prev,next',
        center: 'title',
        right: 'today,<?php echo $peraset->aset_nama; ?>'
      },
      defaultDate: '<?php echo date("Y-m-d"); ?>',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      events: <?php echo $json; ?>

    });

  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
    /* background-color: #D4FFFF; */
  }

  #calendar {
	margin-left : 5%;
  }

</style>
</head>
<body>
    <!-- nav -->
    <a href="#menu" class="menu-link">
        <span>toggle menu</span>
    </a>
    <nav id="menu" class="panel">
        <ul>
            <?php foreach ($aset as $value) { ?>
              <li>
                <a href="<?php echo base_url(); ?>home/index/<?php echo $value->aset_id; ?>" type="submit" class="btn btn-basic"><?php echo $value->aset_nama; ?></a>
              </li>
            <?php
            }
            ?>
            <li>
              <a href="<?php echo base_url(); ?>login" class="">Login</a>
            </li>
        </ul>
    </nav>
    <!-- //nav -->
    <!-- banner -->
    <div class="main position-relative">
      <div class="col-md-12">
        <select class="form-control col-md-3" name="da_id" id="da_id" onchange="javascript:cekda();" style="margin-left:5%;">
          <?php
          foreach ($da as $value) { ?>
            <option value="<?php echo $value->da_id; ?>" <?php if($da_id == $value->da_id){echo "selected";} ?> ><?php echo $value->da_nama; ?></option>
            <?php
          }
          ?>
        </select>
        <hr>
        <input type="hidden" id="id_aset" value="<?php echo $id_aset; ?>">
      </div>
        <!-- banner slider -->
        <section class="slide-wrapper">
            <div id="myCarousel" class="carousel  slide" data-ride="carousel" data-interval="10000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="agile_banner bg1 text-center">
                            <div id='calendar' class="fc-ltr fc-bootstrap4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="<?php echo base_url()?>assets/js/menuFullpage.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/expert.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>

<script type="text/javascript">
function cekda(){
  var da_id = $("#da_id").val();
  // alert (da_id);
  var id_aset = $('#id_aset').val();
	location.href=base_url+"home/index/"+id_aset+"/"+da_id;
}
</script>
