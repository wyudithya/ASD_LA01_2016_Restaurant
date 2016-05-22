<?php require("template/header.php"); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
 
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php require("template/footer.php"); ?>
<script src="<?php echo base_url()?>assets/bower_components/raphael/raphael-min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/morrisjs/morris.min.js"></script>
<script type="text/javascript">
    $(function(){
        Morris.Area({
        element: 'morris-area-chart',
        data: [
        <?php for($i=0;$i<count($sales);$i++){ ?>
        {
            period: 'Week <?php echo $sales[$i]->weekNumber ?>',
            sales: <?php echo $sales[$i]->sales ?>
        }
        <?php if($i==count($sales)-1) echo ','; } ?>
        ],
        xkey: 'period',
        ykeys: ['sales'],
        labels: ['Weekly Sales'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });
    });
</script>