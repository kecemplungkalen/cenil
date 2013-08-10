<div class="span12">
	<form class="form-search pull-right" id="formInboxSearch" >
	  <input type="text" name="search" id="inboxSearch" class="input-medium search-query">
	  <button type="submit" class="btn">Search</button>
	</form>

	<table class="table table-hover">

	    <thead>
		    <tr>
			    <th>
				    #
			    </th>
			    <th>
				    IMEI
			    </th>
			    <th>
				    Send 
			    </th>
			    <th>
				    Receive
			    </th>
			    <th>
				    Status
			    </th>
			    <th>
				    Signal
			    </th>
			    <th>
				    Action
			    </th>
		    </tr>
	    </thead>
	    
	    <tbody>
	    
		<?php if($phone){ ?>
			<?php for($i=0;$i < count($phone);$i++){ ?>
				<tr>
					<td>
						    <?php echo $phone[$i]['ID'];?>
					</td>
					
					<td>
						    <?php echo $phone[$i]['IMEI'];?>
					</td>
					
					<td>
						    <?php if($phone[$i]['Send'] == 'yes') { ?> 
								<span class="label laber-success"><?php echo $phone[$i]['Send'];?></span>
						    <?php } else { ?>
								<span class="label label-important"><?php echo $phone[$i]['Send'];?></span>
						    <?php } ?>
					</td>
					<td>
						     <?php if($phone[$i]['Receive'] == 'yes') { ?> 
								<span class="label laber-success"><?php echo $phone[$i]['Receive'];?></span>
						    <?php } else { ?>
								<span class="label label-important"><?php echo $phone[$i]['Receive'];?></span>
						    <?php } ?>
					</td>
					
					<td>
						    <?php if($phone[$i]['status'] == 1 ){?>
							    <span class="label label-success"> Active</span>
						    <?php } else { ?>
							    <span class="label label-important">Inactive</span>
						    <?php  } ?>
					</td>
					
					<td>
						    <span><i class="icon-signal"></i></span> <?php echo $phone[$i]['Signal'];?>
					</td> 
					
					<td>
						<a class="btn btn-mini btn-primary" id="sikat_" data-IMEI="<?php echo $phone[$i]['IMEI'];?>" onclick="getconfig('_phoneModal','<?php echo $phone[$i]['IMEI'];?>')"><i class="icon-wrench icon-white"></i> Config </a>
					</td>
				</tr>
			<?php }?>
		<?php } ?>
	    </tbody>
	</table>
</div>
<script>
	$('tr').popover();
</script>
