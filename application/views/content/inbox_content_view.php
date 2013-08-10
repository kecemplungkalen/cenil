<?php if(!$load){ ?>
<div class="span12">
	<form class="form-search pull-right" id="formInboxSearch" >
	  <input type="text" name="search" id="inboxSearch" class="input-medium search-query">
	  <button type="submit" class="btn">Search</button>
	</form>
<div class="inboxTable">
	
<?php } ?>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>
					#
				</th>
				<th>
					SenderNumber
				</th>
				<th>
					TextDecoded
				</th>
				<th>
					ReceivingDateTime
				</th>
				<th>
					RecipientID
				</th>
				<th>
					<?php $sortCurrentValue = 'asc'; ?>
					<?php if($sortName){ ?>
						<?php if($sortName == 'Processed'){ ?>
							<?php if($sortValue == 'asc'){ ?>
								<?php $sortCurrentValue = 'desc'; ?>
							<?php } ?>
						<?php } ?>
					<?php } ?>
					<a href="#" data-toggle="tooltip" rel="tooltip" data-placement="top" data-original-title="Click to sort">
						Processed <?php if($sortName){ if($sortName == 'user_email'){ if($sortValue == 'asc'){ echo '<i class="icon-chevron-up"></i>'; }else{ echo '<i class="icon-chevron-down"></i>'; } } } ?>
					</a>
					
					
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if($inbox){ ?>
				<?php foreach($inbox as $inb){?>
					<tr <?php if($inb->Processed == 'false'){ echo 'class="error"';}?>>
						<td><?php echo $inb->ID;?></td>
						<td><?php echo $inb->SenderNumber?></td>
						<td><?php echo $inb->TextDecoded;?></td>
						<td><?php echo $inb->ReceivingDateTime;?></td>
						<td><?php echo $inb->RecipientID;?></td>
						<td>
						<?php if($inb->Processed == 'true'){ ?>
							<span class="label label-success">Processed</span>
						<?php } else { ?>
							<span class="label label-warning">Unprocessed</span>
						<?php }?>
						</td>
					</tr>
				<?php } ?>
			<?php }?>
		</tbody>
	</table>
	<div class="paginating">
		<?php if(isset($pagination) && $pagination){ echo $pagination;}?>
	</div>
<?php if(!$load){?>
	</div>

</div>
<?php }?>

<script type="text/javascript">
		function applyPagination(){
			$(".pagination a").click(function(){
				var load = true;
				var url = $(this).attr("href");
				if(url != undefined){
					var search = $('#inboxSearch').val();
					$.ajax({
						type	: "POST",
						data	: "load="+load+"&loadMenu=_inbox&search="+search,
						url	: url,
						success	: function(msg) {
								$(".inboxTable").html(msg).hide().fadeIn(300);
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
					var searchValue = $('#inboxSearch').val();
					$.post(baseURL+'content/load',{search:searchValue,loadMenu:'_inbox',load:true},function(data){
					
						$(".inboxTable").html(data).hide().fadeIn(300);
					
					});
					applyPagination();
				
				});
				applyPagination();
			});
		<?php } ?>
	
</script>