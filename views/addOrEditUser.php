<h1 id="index-text"><?php echo $data['viewName']?></h1>
<form action="<?php echo $data['action']?>" method="POST">
<input type="hidden" name="userId" value="<?php if (isset($data['userData']->id)) { echo $data['userData']->id; } ?>">
    
    <label for="formEmail">Email: </label>
    <input type="text" name="formEmail" value="<?php if (isset($data['userData']->email)) { echo $data['userData']->email; } ?>"/>
    
    <label for="formRole">Role: </label>
    <select name="formRole" value="12">
        <option value="-1">Select role</option>
        <?php            
            if (!empty($data['rolePicker'])) {
                foreach($data['rolePicker'] as $role) {
                    if($role->id == $data['userData']->role_id) {
                        echo '<option selected value="'. $role->id .'">'. $role->name .'</option>';     
                    } else {
                        echo '<option value="'. $role->id .'">'. $role->name .'</option>';     

                    }
                }
            }
               
        ?>
    </select>
    <label for="formUsername">Username: </label>
    <input type="text" name="formUsername" value="<?php if (isset($data['userData']->username)) { echo $data['userData']->username; } ?>"/>

    <label for="formPassword">Password: </label>
    <input type="text" name="formPassword" value="<?php if (isset($data['userData']->password_raw)) { echo $data['userData']->password_raw; } ?>"/>
   
    <button type="submit" name="submit">Submit</button>
    <a href="/Users">Cancel<a>
</form>