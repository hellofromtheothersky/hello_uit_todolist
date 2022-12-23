<table class="table" id=todoListTable>
	<thead>
		<th class="col-md-1">ID</th>
		<th class="col-md-9">Title</th>
		<th class="col-md-2"> <div class="pull-right">Action</div></th>
	</thead>
	<tbody>
		<?php $i=1;?>
		<?php while($res = mysqli_fetch_assoc($result)){?>
		<tr>
			<td class="col-md-1"><?=$i;$i++;?></td>
			<td class="col-md-9"><?=$res['todoname']?></td>
			<td class="col-md-2">
				<div class="btn-group pull-right">
				<a title="Delete" class="btn btn-danger btn-xs delete-button" id="delete_<?=$res['todo_id']?>" onclick="DeleteItem(<?=$res['todo_id']?>);"><span class='glyphicon glyphicon-trash'></span></a>
				<a style="margin-left: 2px" title="Edit" class="btn btn-info btn-xs edit-button" id="edit_<?=$res['todo_id']?>" onclick="checks(<?=$res['todo_id']?>,'<?=$res['todoname']?>');"><span class='glyphicon glyphicon-edit'></span></a>
				</div>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>