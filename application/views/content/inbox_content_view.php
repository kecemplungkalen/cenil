<div class="span12" style="margin-left:16%">
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
					Processed
				</th>
<!--				<th>
					Action
				</th>-->
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
<!--						<td>
						    <div class="btn-group">
							  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							    Action
							    <span class="caret"></span>
							  </a>
							  <ul class="dropdown-menu">
								<li>
								    <a href="#">Delete</a>
								</li>
							  </ul>
						     </div>
						 </td>-->
					</tr>
				<?php } ?>
			<?php }?>
		</tbody>
	</table>
</div>