<?php require("template/header.php"); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    <?php  
    if($formCount>0)
    {
    ?>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php echo $formCount; ?>
                            </div>
                            <div>New Contact Forms Filled!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() ?>BackEnd/ContactForms">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    <?php }
    if($newOrderCount>0)
    {
     ?>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $newOrderCount; ?></div>
                            <div>New Orders!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() ?>BackEnd/Orders/viewOrder/1">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    <?php }
    if($paymentCount>0)
    {
     ?>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bank fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $paymentCount; ?></div>
                            <div>New Payment Confirmation!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() ?>BackEnd/Payment/">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Weekly sales
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="morris-area-chart"></div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-tags fa-fw"></i> Most Bought Product
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($topProduct)) for($i=0;$i<count($topProduct);$i++){ ?>
                                <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><a href="<?php echo base_url() ?>BackEnd/Products/viewProductbyID/<?php echo $topProduct[$i]->productID; ?>"><?php echo $topProduct[$i]->productName ?></td></a>
                                    <td><?php echo $topProduct[$i]->transactionCount ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
           <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-trophy fa-fw"></i> Top User
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($topUser)) for($i=0;$i<count($topUser);$i++){ ?>
                                <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><a href="<?php echo base_url() ?>BackEnd/Users/detail/<?php echo $topUser[$i]->userID; ?>"><?php echo $topUser[$i]->name ?></td></a>
                                    <td><?php echo $topUser[$i]->count ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-4 -->
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