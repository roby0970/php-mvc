<div class="edit">
    <div class="edit-container">
        <h1 id="index-text" class="edit-title"><?php echo $data['viewName']?></h1>
        <form action="<?php echo $data['action']?>" method="POST" class="edit-form"> 
            <input type="hidden" name="userId" value="<?php if (isset($data['userData']->id)) { echo $data['userData']->id; } ?>">
            <div class="input-container">
                <label for="formEmail">Email: </label>
                <input type="text" name="formEmail" value="<?php if (isset($data['userData']->email)) { echo $data['userData']->email; } ?>"/>
            </div>
            <div class="input-container">
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
            </div>
            <div class="input-container">
                <label for="formUsername">Username: </label>
                <input type="text" name="formUsername" value="<?php if (isset($data['userData']->username)) { echo $data['userData']->username; } ?>"/>
            </div>
            <div class="input-container">
                <label for="formPassword">Password: </label>
                <input type="text" name="formPassword" value="<?php if (isset($data['userData']->password_raw)) { echo $data['userData']->password_raw; } ?>"/>
            </div>
            <div class="user-actions">
                <button type="submit" name="submit">Submit</button>
                <a class="cancel-btn" href="/Users">Cancel</a> 
            </div>
        </form>
    </div>
</div>