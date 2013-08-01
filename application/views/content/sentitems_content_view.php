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
<!--			    <th>
				    Action
			    </th>-->
		    </tr>
	    </thead>
	    
	    <tbody>
		<?php if($sentitems){ ?>
			<?php foreach($sentitems as $sent){ ?>
				<tr data-toggle="popover" data-trigger="hover" data-html="true" data-content="<?php echo htmlspecialchars('<span class="label label-important" >'.$sent->Status.'</span>',ENT_QUOTES);?>" data-original-title="<?php echo $sent->DestinationNumber;?>" data-placement="top">
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
<!--					<td>
						<a class="btn"> Sikat</a>
					</td>-->
				</tr>
			<?php }?>
		<?php } ?>
	    </tbody>
	</table>
</div>
	<script>
		$('tr').popover();
	</script>
