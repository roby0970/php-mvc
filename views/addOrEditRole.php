<div class="edit">
    <div class="edit-container">
        <h1 class="edit-title" id="index-text"><?php echo $data['viewName']?></h1>

        <form action="<?php echo $data['action']?>" method="POST" class="edit-form">
            <input type="hidden" name="roleId" value="<?php if (isset($data['roleId'])) { echo $data['roleId']; } ?>">
            <div class="input-container">
                <label for="formName">Role name: </label>
                <input type="text" name="formName" value="<?php if (isset($data['roleName'])) { echo $data['roleName']; } ?>"/>
            </div>
            <fieldset>
                <legend>Choose permissions for this role:</legend>
            
            <?php foreach ($data['permissionsList'] as $permission) {
                if (isset($data['selectedPermissionsList'])) {
                    $isChecked = in_array($permission, $data['selectedPermissionsList']);
                    if ($isChecked) {
                        echo "<input CHECKED type='checkbox' id=".$permission->id." name=".$permission->id." />";
                    } else {
                        echo "<input type='checkbox' id=".$permission->id." name=".$permission->id." />";
                    }
                } else {
                    echo "<input type='checkbox' id=".$permission->id." name=".$permission->id." />";
                }
                
                
                echo "<label for=".$permission->id."> ".$permission->name." </label>";
                echo '</br>';
            }
            ?>
            </fieldset>
            <div class="user-actions">
                <button type="submit" name="submit">Submit</button>
                <a class="cancel-btn" href="/Roles">Cancel<a>
            </div>
        </form>
    </div>
</div>