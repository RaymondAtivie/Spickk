<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Upload Center</h1>
            <p>This is a place to upload</p>
            <div class="alert alert-info"><span id="num_files" style="font-weight: bold"><?php echo $num_files ?></span> files ready for upload</div>
        </div>
    </div>

    <form action="<?php echo base_url("upload/uploadImages") ?>" method="POST">

        <div class="row">
            <?php
            $i = 0;
            foreach ($files as $file) {
                ?>
                <div class="col-md-6">

                    <div class="row well-sm well" id="box<?php echo $i ?>" f="<?php echo pathinfo($file, PATHINFO_FILENAME) ?>" e="<?php echo pathinfo($file, PATHINFO_EXTENSION) ?>">
                        <div class="col-md-5">
                            <img class="img img-responsive" src="<?php echo base_url($file) ?>" style="width: 300px" alt="" />
                            <input type="hidden" name="file[<?php echo $i ?>]" value="<?php echo $file ?>" />
                        </div> 
                        <div class="col-md-7">
                            <div class="form-group">
                                <input type="text" name="title[<?php echo $i ?>]" class="form-control input-lg" placeholder="Title" value="<?php echo pathinfo($file, PATHINFO_FILENAME) ?>" />
                            </div>
                            <div class="form-group">
                                <textarea name="description[<?php echo $i ?>]" class="form-control input-lg" placeholder="A description of your image"></textarea>
                            </div>
                            <div class="col-md-2">
                                <b>Album</b>
                            </div>
                            <div class="form-group col-md-10">
                                <select name="album_id[<?php echo $i ?>]" class="form-control">
                                    <option value="<?php echo $defaultAlbum->id ?>"><?php echo $defaultAlbum->name ?></option>
                                    <?php foreach ($userAlbums as $album) { ?>
                                        <option value="<?php echo $album->id ?>"><?php echo $album->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>                    
                            <br />             
                            <br />
                            <div class="form-group">
                                <br />
                                <input type="text" name="tags[<?php echo $i ?>]" data-role="tagsinput" class="form-control input-lg" placeholder="Tags&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" >
                                <br />
                                <span style="font-size: smaller">Separate with comma (e.g marriage, monochrome, traditional)</span>
                            </div>

                            <div class="form-group">
                                <button type="button" rel="<?php echo $i ?>" class="btn btn-danger pull-right rmvbtn" ><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Remove</button>
                            </div>
                        </div>               
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-cloud-upload"></i>&nbsp;
                    Upload All
                </button>
            </div>     
            <div class="col-md-2">
                <a href="<?php echo base_url() ?>upload/discard" class="btn btn-danger btn-lg btn-block">
                    <i class="fa fa-trash-o"></i>&nbsp;
                    Discard All
                </a>
            </div>         
        </div>

        <div class="row">
            <div class="col-md-12" style="margin-bottom: 200px">
                &nbsp;
            </div>         
        </div>


    </form>

</div>

<script>
    $(document).ready(function () {
        $(".rmvbtn").click(function () {
            if (confirm("Are you sure you want to REMOVE this image? (It cannot be undone)")) {
                var dd = $(this).attr("rel");
                $("#box" + dd).slideUp(200, function () {

                    var file = $(this).attr("f");
                    var ext = $(this).attr("e");
                    //alert (file);
                    $.get("<?php echo base_url('upload/discard') ?>/" + file + "?ext=" + ext);

                    $(this).remove();

                    var nf = $("#num_files").text();
                    $("#num_files").text(nf - 1);
                });
            }

        })
    });
</script>