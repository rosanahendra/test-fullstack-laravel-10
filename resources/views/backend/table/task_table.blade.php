
<div id="table_<?php echo $table; ?>">
    <table class="table table-bordered table_custom" id="dataTable" cellspacing="0"> 
      <thead>
        <tr>
          <td class="nomor" align="center">No</td>
          <td class="table_header_45">Task Name</td>
          <td class="table_header_45">Action</td>
        </tr>
      </thead>  
      <?php
      foreach($query as $row){  
      ?>
      <tbody>
        <tr>
          <td align="center">
            <?php echo $no; ?>
          </td>
          <td>
               <?php echo $row->task_name; ?>
          </td>
          <td>
            <?php
              if(($meac->meac_U == 1 and $meac->meac_U == $meac->menu_U) or ($meac->meac_D == 1 and $meac->meac_D == $meac->menu_D)){
                  echo '<div style="margin-top:10px;">';	 
                    if($meac->meac_U == 1 and $meac->meac_U == $meac->menu_U){
                      echo ' <a data-bs-toggle="modal" data-bs-target="#myModal_'.$table.'" onclick="data_form('.$row->id.')" style="padding:5px; font-size:12px;" class="btn btn-primary"><i class="fas fa-fw fa-pencil"></i> Edit </a>';
                    }
                    if($meac->meac_D == 1 and $meac->meac_D == $meac->menu_D){
                      echo ' <a style="padding:5px; font-size:12px; margin-top:2px;" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="delete_data('.$row->id.')" class="btn btn-danger"><i class="fas fa-fw fa-close"></i> Delete </a>';
                    }
                  echo '</div>';
              }
              ?>
          </td>
        </tr>
      </tbody>
      <?php 
      $no++; $cek++; } 
      if($cek == 0){
      ?>
          <tbody>
        <tr>
        <td align="center" class="no_data" colspan="3">
              <i class="fa-solid fa-xmark"></i> No Data
          </td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
</div>
