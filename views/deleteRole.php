<h1 id="index-text"><?php echo $data['viewName']?></h1>

<form action="/DeleteRoles/delete" method="POST">
    <p> Are you sure you want to delete role <b><?php echo $data['roleName']?></b>?<p>
        <p> Users that have this role assigned to them, will be reset and will have no role.</p>
    <input type="hidden" name="roleId" value="<?php echo $data['roleId']?>">
    <button type="submit" name="choice" value="1">Yes</button>
    <button type="submit" name="choice" value="0">No</button>
</form>