<?php if(!$load){?>
<div class="span12">
	<form class="form-search pull-right" id="formInboxSearch" >
	  <input type="text" name="search" id="inboxSearch" class="input-medium search-query">
	  <button type="submit" class="btn">Search</button>
	</form>
	<div id="outboxTable">
<?php } ?>	
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
			    <th>
				    SendingTimeOut
			    </th>
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
					<td>
						    <?php echo $obx->SendingTimeOut;?>
					</td>
				</tr>
			<?php }?>
		<?php } ?>
	    </tbody>
	</table>
	   <div id="paging">
		   <?php echo $pagination;?>
	   </div>
<?php if(!$load){?>
</div>
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
<?php } ?>