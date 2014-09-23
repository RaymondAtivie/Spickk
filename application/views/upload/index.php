<link href="<?php echo base_url() ?>assets/css/dropzone/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url() ?>assets/js/dropzone.js"></script>
<script>
    Dropzone.options.myDropzone = {
        maxFilesize: 500,
        init: function() {
            this.on("uploadprogress", function(file, progress) {
                console.log("File progress", progress);
            });
        }
    }
</script>

<div class="container" >
    <div class="row">
        <div class="col-md-12"></div>
    </div>

    <?php if ($this->session->flashdata("msgbox")) { ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 nobm">
                <div class="alert alert-<?php echo $this->session->flashdata("msgbox") ?>">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <?php echo $this->session->flashdata("msgmsg") ?>
                </div>
            </div>
        </div>
    <?php } ?>
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

    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <a href="<?php base_url() ?>upload/work" class="btn btn-primary btn-lg btn-block" >Next&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="col-md-2">
            <a href="<?php base_url() ?>upload/discard" class="btn btn-warning btn-lg btn-block" ><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Discard</a>
        </div>
    </div>
</div>
