<div class="span12" style="margin-left:16%">
	<script>
		$('tr').popover();
	</script>
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
<!--			    <th>
				    Action
			    </th>-->
		    </tr>
	    </thead>
	    
	    <tbody>
	    
		<?php if($phone){ ?>
			<?php foreach($phone as $pn){ ?>
				<tr data-toggle="popover" data-trigger="hover" data-html="true" data-content="<?php echo htmlspecialchars('<span class="label label-important" > Signal : '.$pn->Signal.'</span>',ENT_QUOTES);?>" data-original-title="<?php echo $pn->IMEI;?>" data-placement="top">
					<td>
						    <?php echo $pn->ID;?>
					</td>
					
					<td>
						    <?php echo $pn->IMEI;?>
					</td>
					
					<td>
						    <?php if($pn->Send == 'yes') { ?> 
								<span class="label laber-success"><?php echo $pn->Send;?></span>
						    <?php } else { ?>
								<span class="label label-important"><?php echo $pn->Send;?></span>
						    <?php } ?>
					</td>
					<td>
						     <?php if($pn->Receive == 'yes') { ?> 
								<span class="label laber-success"><?php echo $pn->Send;?></span>
						    <?php } else { ?>
								<span class="label label-important"><?php echo $pn->Send;?></span>
						    <?php } ?>
					</td>
					
					<td>
						    <span class="label label-important"> Active</span>
					</td>
					
					<td>
						    <?php echo $pn->Signal;?>
					</td>
					
<!--					<td>
						<a class="btn btn-mini" id="sikat_"> <?php echo $pn->ID;?>Sikat</a>
					</td>-->
				</tr>
			<?php }?>
		<?php } ?>
	    </tbody>
	</table>
</div>