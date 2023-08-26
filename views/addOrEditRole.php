<h1 id="index-text"><?php echo $data['viewName']?></h1>

<form action="<?php echo $data['action']?>" method="POST">
    <input type="hidden" name="roleId" value="<?php if (isset($data['roleName'])) { echo $data['roleName']; } ?>">
    <label for="formName">Role name: </label>
    <input type="text" name="formName" value="<?php if (isset($data['roleName'])) { echo $data['roleName']; } ?>"/>
    <button type="submit" name="submit">Submit</button>
    <a href="/Roles">Cancel<a>
</form>