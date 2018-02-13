<h2>Edit User</h2>
<form  method="post" action="">
    <input type="hidden" name="csrf_token" value="<?php echo Session::get('csrf_token'); ?>">
    <div class="form-body">
        <div class="form-group">
            <label>Login</label>
            <div class="input-group">
                <input type="text" name="login" value="<?php echo $data['user']['login']; ?>" class="form-control" placeholder="Login">
            </div>
        </div>
        <div class="form-group">
            <label>Email Address</label>
            <div class="input-group">
                <input type="text" name="email" value="<?php echo $data['user']['email']; ?>" class="form-control" placeholder="Email Address">
            </div>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="admin" <?php echo  $data['user']['role'] == 'admin' ? 'selected="selected"' : ''; ?> >Admin</option>
                <option value="user" <?php echo $data['user']['role'] == 'user' ? 'selected="selected"' : ''; ?> >User</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" <?php echo  $data['user']['is_active'] ? 'selected="selected"' : ''; ?> >Active</option>
                <option value="0" <?php echo  $data['user']['is_active'] ? '' : 'selected="selected"'; ?> >Inactive</option>
            </select>
        </div>
        <div class="input-group">
            <input name="password" type="password" class="form-control"  placeholder="Password">
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn blue">Submit</button>
        <a href="/"><button type="button" class="btn default">Cancel</button></a>
    </div>
</form>