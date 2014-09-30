<style>
    /*body{background: #eee url(http://subtlepatterns.com/patterns/sativa.png);}*/
    body{        
        background-color: #444;
        background: url('<?php echo base_url() ?>assets/img/gallery/imgg2.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    html,body{
        position: relative;
        height: 100%;
    }

    .login-container{
        padding: 20px 40px 40px;
        text-align: center;
        background: #fff;
        border: 1px solid #ccc;
        //background-image: url('<?php echo base_url() ?>assets/img/LoginSquareBack.jpg')
    }

    #output{
        position: absolute;
        width: 300px;
        top: -75px;
        left: 0;
        color: #fff;
    }

    #output.alert-success{
        background: rgb(25, 204, 25);
    }

    #output.alert-danger{
        background: rgb(228, 105, 105);
    }


    .login-container::before,.login-container::after{
        content: "";
        position: absolute;
        width: 100%;height: 100%;
        top: 3.5px;left: 0;
        background: #fff;
        z-index: -1;
        -webkit-transform: rotateZ(4deg);
        -moz-transform: rotateZ(4deg);
        -ms-transform: rotateZ(4deg);
        border: 1px solid #ccc;
        //background-image: url('<?php echo base_url() ?>assets/img/LoginSquareBack.jpg');
        box-shadow: 3px 3px 10px #888888;
    }

    .login-container::after{
        top: 5px;
        z-index: -2;
        -webkit-transform: rotateZ(-2deg);
        -moz-transform: rotateZ(-2deg);
        -ms-transform: rotateZ(-2deg);
        //background-image: url('<?php echo base_url() ?>assets/img/LoginSquareBack.jpg');
        box-shadow: 3px 3px 10px #888888;
    }

    .avatar{        
        margin: 10px auto 30px;
        text-align: center;
    }
    .avatar img{
        max-height: 80px
    }

    .form-box input{
        width: 100%;
        padding: 10px;
        text-align: center;
        height:40px;
        border: 1px solid #ccc;;
        background: #fafafa;
        transition:0.2s ease-in-out;

    }

    .form-box input:focus{
        outline: 0;
        background: #eee;
    }

    .form-box input[type="text"]{
        border-radius: 5px 5px 0 0;
        text-transform: lowercase;
    }

    .form-box input[type="password"]{
        border-radius: 0 0 5px 5px;
        border-top: 0;
    }

    .form-box button.login{
        margin-top:15px;
        padding: 10px 20px;
    }

    .animated {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }

    @-webkit-keyframes fadeInUp {
        0% {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            -webkit-transform: translateY(20px);
            -ms-transform: translateY(20px);
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }
    }

    .fadeInUp {
        -webkit-animation-name: fadeInUp;
        animation-name: fadeInUp;
    }
    /* Credit to bootsnipp.com for the css for the color graph */
    .colorgraph {
        height: 5px;
        border-top: 0;
        background: #c4e17f;
        border-radius: 5px;
        background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    }

    #regForm{
        <?php if ($this->session->flashdata("regBox") == "true") { ?>
            display: block;
        <?php } elseif ($this->session->flashdata("regBox") == "false" || !$this->session->flashdata("regBox")) { ?>
            display: none;
        <?php } ?>
    }
</style>

<script>
$(document).ready(function(){
    $("#con").hover(function(){
        $(this).animate({"opacity":"1"});
    }, function(){
        $(this).animate({"opacity":"0.5"});
    });
});
</script>

<div id="con" style="opacity: 0.5" class="container">
    <div  class="login-container col-md-6 col-md-offset-3" style="margin-top: 5%;">

        <div class="avatar">
            <img src='<?php echo base_url() ?>assets/img/jquery.png' alt='logo'/>
            <h4>This is a tag line that can be editable</h4>
            <h5>This is a tag line that can be editable</h5>
        </div>


        <?php $this->handler->msgBox() ?>

        <div class="form-box">
            <form role="form" id='regForm' action='<?php echo base_url("login/register") ?>' method="POST" >
                <h2>Please Sign Up <small>It's free and always will be.</small></h2>
                <hr class="colorgraph">

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" required name="firstname" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" required name="lastname" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="username" required id="display_name" class="form-control input-lg" placeholder="UserName" tabindex="3">
                </div>
                <div class="form-group">
                    <input type="email" name="email" required id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                </div>
                <div class='row'>

                    <div class="form-group btn-group" data-toggle="buttons">
                        <label class="btn btn-info">
                            <input type="radio" required name="catId" value="1" id="option1" checked> Photographer
                        </label>
                        <label class="btn btn-info">
                            <input type="radio" required name="catId" value="2" id="option2"> Make-up Artist
                        </label>
                        <label class="btn btn-info">
                            <input type="radio" required name="catId" value="4" id="option3"> Model
                        </label>
                        <label class="btn btn-info">
                            <input type="radio" required name="catId" value="3" id="option4"> Fashion Designer
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" required name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" required name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12"><button type="submit" class="btn btn-primary btn-block login" >Register</button></div>
                </div>
            </form>
            <hr class='colorgraph' />
            <h2><small>Already registered?</small> Login Here </h2>

            <form action="<?php echo base_url("login/signin") ?>" method="POST">
                <input name="username" type="text" placeholder="username or email">
                <input type="password" name="password" placeholder="password">
                <div class='row'>
                    <div class='col-md-8'>
                        <button class="btn btn-primary btn-block login" type="submit">Login</button>
                    </div> 
                    <div class='col-md-4'>
                        <button class="btn btn-warning btn-block login" id='regBtn' type="button">Sign Up</button>
                    </div> 
                </div>         
                <div class='row'>
                    <div class='col-md-6 col-md-offset-3'>
                        <a class="btn btn-success btn-lg btn-block login" href="<?php echo base_url("gallery") ?>" style='margin-top: 20px'>
                            <i class='fa fa-list'></i>&nbsp; Explore
                        </a>
                    </div> 
                </div>     
            </form>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $("#regBtn").click(function() {
            $("#regForm").slideDown(500);
        });
    });
</script>