<div class="container">
    <div class="row">
        <div class="col-md-12 nobm">
            <div class="row">
                <div class="col-md-12"></div>
            </div>
            <form action="<?php echo base_url("gallery/search") ?>" method="POST">
                <div class="row">
                    <div class="col-md-1">
                        <h3>Search: </h3>
                    </div>
                    <div class="col-md-5">
                        <input name="search" type="search" class="form-control input-lg col-md-6" value="<?php echo $term ?>" />
                    </div>
                    <div class="col-md-3">
                        <select name="category" class="form-control input-lg col-md-3">
                            <option value="">--ALL CATEGORY--</option>
                            <?php foreach ($categories as $cat) { ?>
                                <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="type" class="form-control input-lg col-md-3">
                            <option value="up">User and Pictures</option>
                            <option value="user">User</option>
                            <option value="picture">Pictures</option>
                        </select>
                    </div>
                </div>

                <span class="pull-right"><b><?php echo $searchCount ?></b> Result(s) for "<b><?php echo $term ?></b>"</span>
            </form>
        </div>
    </div>    
</div>