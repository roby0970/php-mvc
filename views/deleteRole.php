<div class="delete-view">
    <div class="delete-container">
        <h1 id="index-text"><?php echo $data['viewName']?></h1>

        <form action="/DeleteRoles/delete" method="POST" class="form-action">
            <p> Are you sure you want to delete role <b><?php echo $data['roleName']?></b>?<p>
            <p> Users that have this role assigned to them, will be reset and will have no role.</p>
            <input type="hidden" name="roleId" value="<?php echo $data['roleId']?>">
            <div class="user-actions">
                <button type="submit" name="choice" value="1">Yes</button>
                <button class="secondary" type="submit" name="choice" value="0">No</button>
            </div>
        </form>
    </div>
</div>