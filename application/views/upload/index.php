<link href="<?php echo base_url() ?>assets/css/dropzone/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url() ?>assets/js/dropzone.js"></script>
<script>
    Dropzone.options.myDropzone = {
        maxFilesize: 500,
        init: function () {
            this.on("uploadprogress", function (file, progress) {
                console.log("File progress", progress);
            });
        }
    }
</script>

<div class="container" >
    <div class="row">
        <div class="col-md-12"></div>
    </div>


    <div class="row">
        <div class="col-md-6 col-md-offset-3 nobm">
            <?php $this->handler->msgBox() ?>
        </div>
    </div>
    <?php if ($this->session->flashdata("msgboxDanger") == "danger") { ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 nobm">           
                <div class="alert alert-<?php echo $this->session->flashdata("msgboxDanger") ?>">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <?php echo $this->session->flashdata("msgmsgDanger") ?>
                </div>            
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="border: 2px black dashed">

            <form action="<?php echo base_url() ?>upload/fileUpload"
                  class="dropzone"
                  id="my-awesome-dropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>

        </div>        
    </div>

    <form action="<?php base_url() ?>upload/work" method="POST">
        <div class="row">
            <div class="col-md-6 col-md-offset-3"  style="text-align: center">
                <div class="row">
                    <div class="col-md-5">
                        <p>Select an Album</p>
                        <select id="albumselect" name="album_id" class="form-control">
                            <option value="0">--SELECT ALBUM--</option>
                            <?php foreach ($albums as $album) { ?>
                                <option <?php if($album->name == "General"){ echo "selected";} ?> value="<?php echo $album->id ?>"><?php echo $album->name ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-1" style="text-align: center">
                        <h3>Or</h3>
                    </div>

                    <div class="col-md-5">
                        <p>Create a new Album</p>
                        <input id="newAlbum" type="text" placeholder="Name" class="form-control" name="album_name" />
                        <textarea class="form-control" name="album_description" placeholder="Description" rows="3" style="resize: none"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-danger">
                            You can still change the individual image album
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block" >Next&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
            </div>
            <div class="col-md-2">
                <a href="<?php base_url() ?>upload/discard" class="btn btn-warning btn-lg btn-block" ><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Discard</a>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
       $("#newAlbum").keyup(function(){
          $("#albumselect").val('0'); 
       }); 
    });
</script>