<div class="edit">
    <div class="edit-container">
        <h1 class="edit-title" id="index-text"><?php echo $data['viewName']?></h1>

        <form action="<?php echo $data['action']?>" method="POST" class="edit-form">
            <input type="hidden" name="roleId" value="<?php if (isset($data['roleName'])) { echo $data['roleName']; } ?>">
            <div class="input-container">
                <label for="formName">Role name: </label>
                <input type="text" name="formName" value="<?php if (isset($data['roleName'])) { echo $data['roleName']; } ?>"/>
            </div>
            <div class="user-actions">
                <button type="submit" name="submit">Submit</button>
                <a href="/Roles">Cancel<a>
            </div>
        </form>
    </div>
</div>