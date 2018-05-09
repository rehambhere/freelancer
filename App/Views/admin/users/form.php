<div class="modal fade" id="<?php echo $target ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New User</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo $action ;?>" method="post" class="form-modal form" >
                    <div id="form-results"></div>
                    <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="first_name" name="first_name" value="<?php echo $first_name;?>">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="last_name" name="last_name" value="<?php echo $last_name;?>">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="<?php echo $email;?>">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="password" name="password" ">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Confirm-password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="confirm_password" name="confirm_password">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Biryhday</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Birthday" name="birthday" value="<?php echo $birthday;?>">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="exampleInputPassword1">Status</label>

                        <select class="form-control" id="exampleInputPassword1" name="role">
                               <?php  if($id ==1) {?>
                                    <option value="<?php echo $role;?>" <?php echo $role === $id?'selected':false;?>><?php echo $role;?></option>
                           <?php } elseif ($id !==1){?>
                                   <option value="freelancer">Freelancer</option>
                                       <option value="company" <?php echo $role === $id?'selected':false ;?>>Company</option>

                                   <?php }?>

                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="exampleInputPassword1">gender</label>
                        <select class="form-control" id="exampleInputPassword1" name="gender">
                            <option value="male">Male </option>
                            <option value="female" <?php echo $gender== 'female'?'selected':false ;?>>Female</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="exampleInputPassword1">Status</label>
                        <select class="form-control" id="exampleInputPassword1" name="status">
                            <option value="enabled">Enabled </option>
                            <option value="disabled" <?php echo $status== 'disabled'?'selected':false ;?>>Disabled</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Upload-file</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" placeholder="upload-file" name="image">
                    </div>
                    <?php if($image) {?>
                        <div class="form-group col-sm-6">
                          <img src="<?php echo $image;?>" alt="" style="width=50px ; height: 50px">
                        </div>
                    <?php } ?>
                    <div class="clearfix"></div>

                    <button  class="btn btn-info submit-btn">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
