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
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="title" name="title" value="<?php echo $title;?>">
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Tags</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="tags" name="tags" value="<?php echo $tags;?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="details">details</label>
                        <textarea name="details" class="details" id="details" cols="30" rows="10" ><?php echo $details?></textarea>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="category_id">Categories</label>
                        <select class="form-control" id="category_id" name="category_id">

                        <?php foreach ($categories as $category) {?>
                            <option value="<?php echo $category->id ;?>"<?php echo $category->id == $category_id ? 'selected':false;?>"><?php echo $category->name;?></option>

                        <?php } ?>
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
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
   for(name in CKEDITOR.instances){
       CKEDITOR.instances[name].destroy();
   }
    CKEDITOR.replaceAll( 'details' );
</script>