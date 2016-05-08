<?php require("template/header.php"); ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php if(isset($header)) echo "User - ".$header; else echo "All User"; ?></h1>
                    
        </div>
    </div>

    <div class="row">
    	<div class="col-md-2 col-xs-5 col-md-offset-6 col-xs-offset-1">
    		<select class="form-control" name="type" id="selectType">
    			<option value="Username">Username</option>
    			<option value="Name">Name</option>
    		</select>
    	</div>
    	<div class="col-md-4 col-xs-6">
    		<div class="input-group">
    			<input type="text" class="form-control" id="txtSearch" name="str" placeholder="Search for...">
    			<span class="input-group-btn">
    				<button class="btn btn-default" type="button" name="Search" value="Search" onclick="loadData()"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
    			</span>
    		</div><!-- /input-group -->
    	</div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
	<div class="row">
		<div class="col-md-12" style="margin-top:20px;">
			<table class="table table-bordered table-hover table-striped tablesorter">
			<thead>
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Name</th>
				<th>Address</th>
				<th>DOB</th>
				<th>UserType</th>
			</tr>
			</thead>
			<tbody id = 'record_User'>
			<?php
			if(count($user) != 0 )
			{
				for($i=0;$i<count($user);$i++)
				{ ?>
					<tr onclick="document.location = '<?php echo base_url() ?>BackEnd/Users/detail/<?php echo $user[$i]->UserID ?>';" style="cursor:pointer">
						<td><?php echo ($i+1) ?></td>
						<td><?php echo $user[$i]->Username ?></td>
						<td><?php echo $user[$i]->Name ?></td>
						<td><?php echo $user[$i]->Address ?></td>
						<td><?php echo $user[$i]->DOB ?></td>
						<td><?php echo $user[$i]->UserType ?></td>

					</tr>
				<?php } 
			} else{ ?>
				<tr>
						<td colspan="6" style="text-align: center;">No Data Available</td>
					
					</tr>
					<?php
			}
			?>
			</tbody>
			</table>
		</div>
	</div>
</div>

<?php require("template/footer.php"); ?>
<script type="text/javascript">
	$(document).ready(function(){
    $(".tablesorter").tablesorter();
});
	 function loadData(){

         selectType = $("#selectType").val();
         str = $("#txtSearch").val();
         $.ajax({
            url:'<?php echo base_url('BackEnd/Users/search_get_user')?>',
            data:{SelectType:selectType,str:str},
            type:'POST',
        }).done(function(data)
            {
            	result = jQuery.parseJSON(data);
            	content ="";
            	i = 0;
                $.each(result, function(key, value) {
                		i++;
  						content += '<tr onclick="document.location = '+ '<?php echo "\'".base_url()?>BackEnd/Users/detail/'+value.UserID+'\''+';" style="cursor:pointer">';
  						content += '<td>'+ i +'</td>';
  						content += '<td>'+ value.Username +'</td>';
  						content += '<td>'+ value.Name +'</td>';
  						content += '<td>'+ value.Address +'</td>';
						content += '<td>'+ value.DOB +'</td>';
						content += '<td>'+ value.UserType +'</td>';
						content += '</tr>';
					
				});
                if(i==0){
                	content += '<tr>';
                	content += '<td colspan="6" style="text-align: center;">No Data Available</td>';
                	content += '<tr>';
                }
       			$("#record_User").html(content); 
       			$(".tablesorter").trigger("update");
            });
     }
</script>