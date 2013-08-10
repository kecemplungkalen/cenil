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
				    DestinationNumber
			    </th>
			    <th>
				    TextDecoded 
			    </th>
			    <th>
				    SendingDateTime
			    </th>
			    <th>
				    SenderID
			    </th>
		    </tr>
	    </thead>
	    
	    <tbody>
		<?php if($sentitems){ ?>
			<?php foreach($sentitems as $sent){ ?>
				<tr>
					<td>
						    <?php echo $sent->ID;?>
					</td>
					
					<td>
						    <?php echo $sent->DestinationNumber;?>
					</td>
					
					<td>
						    <p><?php echo $sent->TextDecoded;?></p>
					</td>
					<td>
						    <?php echo $sent->SendingDateTime;?>
					</td>
					
					<td>
						    <?php echo $sent->SenderID;?>
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
