<div class="container">
    <div class="row">
        <div class="col-md-12 nobm">
            <form action="<?php echo base_url("gallery/search") ?>" method="POST">
                <h3 class="page-header">Search: &nbsp;&nbsp;
                    <input name="search" type="search" style="display: inline-block; width: 50%" class="form-control input-lg" value="<?php echo $term ?>" />
                </h3>
                <span class="pull-right"><b><?php echo $searchCount ?></b> Result(s) for "<b><?php echo $term ?></b>"</span>
            </form>
        </div>
    </div>    
</div>