<?php if(!$load){?>
<div class="span12">
	<form class="form-search pull-right" id="formInboxSearch" >
	  <input type="text" name="search" id="boxSearch" class="input-medium search-query">
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
	   
<script type="text/javascript">
		function applyPagination(){
			$("#paging a").click(function(){
				var load = true;
				var url = $(this).attr("href");
				if(url != undefined){
					var search = $('#boxSearch').val();
					$.ajax({
						type	: "POST",
						data	: "load="+load+"&loadMenu=_outbox&search="+search,
						url	: url,
						success	: function(msg) {
								$("#outboxTable").html(msg).hide().fadeIn(300);
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
					$.post(baseURL+'content/load',{search:searchValue,loadMenu:'_outbox',load:true},function(data){
					
						$("#outboxTable").html(data).hide().fadeIn(300);
					
					});
					applyPagination();
				
				});
				applyPagination();
			});
		<?php } ?>
	
</script>	   
	   
	   
	   
	   
	   
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