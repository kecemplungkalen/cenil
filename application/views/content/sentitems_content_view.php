<?php if(!$load){?>
	<div class="span12">
		<form class="form-search pull-right" id="formInboxSearch" >
		  <input type="text" name="search" id="boxSearch" class="input-medium search-query">
		  <button type="submit" class="btn">Search</button>
		</form>
			<div id="sentTable">

<?php } ?>

	<table class="table table-hover">
	    <thead>
		    <tr>
			    <th>
				    #
			    </th>
			    <th>
				    Destination Number
			    </th>
			    <th>
				    Text Decoded 
			    </th>
			    <th>
				    Sending DateTime
			    </th>
			    <th>
				    Sender ID
			    </th>
			    
			    <th>
				    Sent Status 
<!-- 				    'SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','','DeliveryUnknown','Error' -->
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
					<td>
						    <?php if(($sent->Status == 'SendingOK') || ($sent->Status == 'SendingOKNoReport')){?>
							    <span class="label label-success"><?php echo $sent->Status;?></span>
						    <?php } ?>
						    <?php if(($sent->Status == 'SendingError') || ($sent->Status == 'DeliveryFailed')|| ($sent->Status == 'Error')){?>
							    <span class="label label-important"><?php echo $sent->Status;?></span>
						    <?php } ?>
						    <?php if(($sent->Status == 'DeliveryPending') || ($sent->Status == 'DeliveryUnknown')){?>
							    <span class="label"><?php echo $sent->Status;?></span>
						    <?php } ?>
						    
					</td>
				</tr>
			<?php }?>
		<?php } ?>
	    </tbody>
	</table>
	<div id="paging">
		<?php echo $pagination;?>
	</div>
	
<script type="text/javascript">
		function applyPagination(){
			$("#paging a").click(function(){
				var load = true;
				var url = $(this).attr("href");
				if(url != undefined){
					var search = $('#boxSearch').val();
					$.ajax({
						type	: "POST",
						data	: "load="+load+"&loadMenu=_sent&search="+search,
						url	: url,
						success	: function(msg) {
								$("#sentTable").html(msg).hide().fadeIn(300);
								applyPagination();
							}
					});
				}
				return false;
			});
		}
		
		<?php if(!$load){ ?>
			$(document).ready(function(){
				$('#formInboxSearch').submit(function(event){
					event.preventDefault();
					var searchValue = $('#boxSearch').val();
					$.post(baseURL+'content/load',{search:searchValue,loadMenu:'_sent',load:true},function(data){
					
						$("#sentTable").html(data).hide().fadeIn(300);
					
					});
					applyPagination();
				
				});
				applyPagination();
			});
		<?php } ?>
	
</script>	   
	

<?php if(!$load){?>
	</div>

	</div>
		<script>
			$('tr').popover();
		</script>
<?php }?>
