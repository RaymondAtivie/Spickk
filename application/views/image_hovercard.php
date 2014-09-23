
<div class="row" style="width: 300px">
    <div class="col-md-3 nobm">
        <img src="http://placehold.it/60x50" />
        <span class="label label-sm label-primary" style="font-size: 8px">Photographer</span>
    </div>

    <div class="col-md-9 nobm">
        <div class="row">
            <div class="col-md-12 nobm">
                <p><small><?php echo $image->description ?></small></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 nobm">
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group">
                        <button title='Like' type="button" class="btn btn-xs btn-primary"><span class="fa fa-thumbs-up"></span></button>
                        <button title='Favorite' type="button" class="btn btn-xs btn-danger"><span class="fa fa-star"></span></button>
                    </div>

                    <div class="btn-group">
                        <button title='Quick View' type="button" class="btn btn-xs btn-info"><span class="fa fa-search-plus"></span></button>
                        <a href="<?php echo base_url() ?>gallery/image" title='Full Image' class="btn btn-xs btn-info"><span class="fa fa-external-link-square"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 nobm">
                <small class="text-info"><b>45</b> Views</small>
            </div>
        </div>

    </div>
</div>