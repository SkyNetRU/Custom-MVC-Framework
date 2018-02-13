<div class="table-toolbar">
	<div class="row">
		<div class="col-md-6">
            <?php if ($data['current_user']['role'] == 'admin') {?>
            <div class="btn-group">
                <a href="<?php echo BASE_URL; ?>/users/adduser/">
                    <button id="sample_editable_1_new" class="btn sbold green"> Add New
                        <i class="fa fa-plus"></i>
                    </button>
                </a>
            </div>
            <?php }; ?>
		</div>
        <div class="col-md-6">
            <div class="btn-group">
                <a href="<?php echo BASE_URL; ?>/auth/logout/">
                    <button id="sample_editable_1_new" class="btn sbold red"> Logout
                        <i class="fa fa-plus"></i>
                    </button>
                </a>
            </div>
        </div>
	</div>
</div>

<table class="table table-striped table-bordered table-hover order-column" id="users">
	<thead>
	<tr>
		<th> Login </th>
		<th> Email </th>
		<th> Status </th>
		<th> Role </th>
		<th> Actions </th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($data['users'] as $user)
		{ ?>
			<tr class="odd gradeX" data-user_id="<?php echo $user['id']; ?>">
				<td> <?php echo $user['login']; ?> </td>
				<td> <?php echo $user['email']; ?> </td>
				<td> <?php echo $user['is_active'] ? 'Active' : 'Inactive'; ?> </td>
				<td> <?php echo $user['role']; ?> </td>
				<td>
					<div class="btn-group">
						<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
							<i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-left" role="menu">
							<?php if ($data['current_user']['role'] == 'admin') {?>
							<li>
								<a href="<?php echo BASE_URL; ?>/users/deleteUser/<?php echo $user['id']; ?>" class="delete">
									<i class="icon-docs"></i> Delete </a>
							</li>
							<li>
								<a href="<?php echo BASE_URL; ?>/users/edit/<?php echo $user['id']; ?>" class="edit">
									<i class="icon-tag"></i> Edit </a>
							</li>
							<?php }; ?>
						</ul>
					</div>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
  $(document).ready(function(){
    $('#users').DataTable();
  });
</script>


