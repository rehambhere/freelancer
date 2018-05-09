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
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Category_name" name="name" value="<?php echo $name;?>">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="exampleInputPassword1">Status</label>
                        <select class="form-control" id="exampleInputPassword1" name="status">
                            <option value="enabled">Enabled </option>
                            <option value="disabled" <?php echo $status== 'disabled'?'selected':false ;?>>Disabled</option>
                        </select>
                    </div>
                    <button  class="btn btn-info submit-btn">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
