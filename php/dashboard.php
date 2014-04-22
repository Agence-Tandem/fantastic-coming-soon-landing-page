<?php 


require_once('../php/sorting.php');
?>
	<div class='subscriberls'>
		<div class="header">
			<a href="../">
			<img src="../<?php echo $conf['logo_file']; ?>" width="<?php echo $conf['logo_width']; ?>" height="<?php echo $conf['logo_height']; ?>" alt="<?php echo $conf['logo_alt_text']; ?>" class="img-rounded" />
			</a>
		</div>
		<p class="pull-right"><?php echo $lang['active_user']; ?> : <?php echo $active['rows']; ?> | <?php echo $lang['inactive_user']; ?> : <?php echo $inactive['rows'] ?> | <?php echo $lang['total']; ?> : <?php echo $totalrows; ?> <?php echo $lang['subscribers'] ?></p>
		<div class="subtable">
			<?php if($totalrows>0) { ?>
			<form method="post" action="index.php?admin=action">
				<table class='table table-hover'>
					<thead>
						<tr>
							<th></th><?php
								foreach ($array as $key=>$value) {
									if($key=="id")
										$field = str_replace("id","#",$key);
									else
										$field = str_replace("_"," ",$key);
									$field = ucwords($field);
									$field = columnSortArrows($key,$field,$orderby,$sort);?>
							<th>
								<?php echo $field ?>
							</th><?php } ?>
						</tr>
					</thead>
					<tbody>
					<?php mysqli_data_seek($result,0); while($row = mysqli_fetch_assoc($result)){ ?>
						<tr>
							<?php foreach ($row as $field=>$value) { if($field=="id") { ?>
							<td>
								<input name="checkbox[]" type="checkbox" value="<?php echo $value ?>" />
							</td>
							<td>
								<?php echo $value ?>
							</td><?php }else{?>
							<td>
								<?php echo $value ?>
							</td><?php   }}} ?>
						</tr>
					</tbody>
				</table>
				<div class="option">
					<input class="btn btn-primary btn-sm" name="button" type="submit" value="<?php echo $lang['delete']; ?>" />
					<input class="btn btn-primary btn-sm" name="button" type="submit" value="<?php echo $lang['delete_all']; ?>" />
					<input class="btn btn-primary btn-sm" name="button" type="submit" value="<?php echo $lang['export_all']; ?>" />
					<?php if(!($prev_link==null && $next_link==null && $pagination_links==null)){ ?>
					<ul class="pagination pagination-sm pull-right">
					<?php
						echo $prev_link;
						echo $pagination_links;
						echo $next_link;
					?>
					</ul><?php } ?>
				</div>
			</form>
		</div>
		<?php } else { ?>
		<div class="empty"><?php echo $lang['no_subscribers']; ?></div><?php } ?>
	</div>
