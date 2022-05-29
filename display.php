<?php

include_once('config.php');


?>
<div class="container ">
  <div class="col-md-12">
    <div style="height:12vh"></div>
    <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" id="myInput" placeholder="Search..." onkeyup="searchFun()">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
      <h2> Vote Information</h2>

    <table class="table table-striped table-bordered table-hover table-tb" id="mytable">   
        <tr style="font-size:25px"> 
        <td>canidate</td>
        <td>vote count</td>
       
    </tr>
    <?php while($data=mysqli_fetch_assoc($result)){ ?>
    <tr>
        <td><?php echo $data['canidate_name']?></td>
        <td><?php echo $data['vote_count']?></td>
       </tr>
    <?php }?>
    </table>
    </div>
    </div>
