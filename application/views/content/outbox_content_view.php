<div class="span12" style="margin-left:16%">

	<table class="table table-hover">

	    <thead>
		    <tr>
			    <th>
				    #
			    </th>
			    <th>
				    DestinationNumber
			    </th>
			    <th>
				    TextDecoded 
			    </th>
			    <th>
				    Mutipart
			    </th>
			    <th>
				    SenderID
			    </th>
			    <th>
				    CreatorID
			    </th>
<!--			    <th>
				    Action
			    </th>-->
		    </tr>
	    </thead>
	    
	    <tbody>
	    
		<?php if($outbox){ ?>
			<?php foreach($outbox as $obx){ ?>
				<tr>
					<td>
						    <?php echo $obx->ID;?>
					</td>
					
					<td>
						    <?php echo $obx->DestinationNumber;?>
					</td>
					
					<td>
						    <?php echo $obx->TextDecoded;?>
					</td>

					<td>
						    <?php echo $obx->MultiPart;?>
					</td>
					
					<td>
						    <?php echo $obx->SenderID;?>
					</td>
					
					<td>
						    <?php echo $obx->CreatorID;?>
					</td>
<!--					
					<td>
					<a href="#" id="status" data-mode="popup"  data-type="select" data-pk="<?php echo $obx->ID;?>" data-value="3"  data-placement="left" data-original-title="Select status" class="btnAction  editable-click"></a>
					</td>-->
				</tr>
			<?php }?>
		<?php } ?>
	    </tbody>
	</table>
	
	<script>
		$(document).ready(function(){
		
			 $('.btnAction').editable({
			 
			         source: [
				      {value: 1, text: 'Active'},
				      {value: 2, text: 'Blocked'},
				      {value: 3, text: 'Deleted'}
				   ]
			 
			 });
		
		});
	</script>
</div>