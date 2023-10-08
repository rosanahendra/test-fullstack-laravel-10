<div id="data_form">
            
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php 
                            $var_name = 'category_task_id'; 
                            $label = 'Task Category';
                            ?>
                            <label for="basicInput"><?php echo $label; ?></label>
                            <select name="<?php echo $var_name; ?>" class="form-control">
                                <option value="">Pilih <?php echo $label; ?></option>
                                <?php 
                                for($i = 0;$i <= count($response);$i++){
                                $var = ''; if($ID){ $var = $update->$var_name; }
                                ?>
                                <option value="<?php echo $row->$var_name; ?>" <?php if($ID){if($var == $row['data'][$i]['id']){ echo 'selected'; }} ?>>
                                    <?php echo $row['data'][$i]['category_task_name']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php 
                            $var_name = 'task_name'; 
                            $label = 'Task Name';
                            $var = ''; if($ID){ $var = $update->$var_name; }
                            ?>
                            <label for="basicInput"><?php echo $label; ?></label>
                            <input class="form-control" name="<?php echo $var_name; ?>" placeholder="<?php echo $label; ?>" type="text" value="<?php if($ID){ echo $var; } ?>">
                            <div id="message_<?php echo $var_name; ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    
    <section class="section">
        <div class="row">
            <div class="col-md-12 text-center">
                <div id="button_save">
                    <input type="submit" value="Simpan" name="save" class="btn btn-primary" />
                </div>
            </div>
        </div>
    </section>
</div> 