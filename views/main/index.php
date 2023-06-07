<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

use yii\helpers\BaseUrl;

?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Login</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3">
            </div>
            <div class="col-lg-4 mb-3">
                
            <form>
                <div class="mb-3">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="txtEmail" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="txtPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="txtPassword">
                </div>
            </form>                
            <button type="button" class="btn btn-primary" id="btn-Login">Log In</button>
            <hr>
            <p>Belum terdaftar? Klik <a href="<?php echo BaseUrl::home('http')."main/register"; ?>">disini</a></p>
            </div>
            <div class="col-lg-4">
            </div>
        </div>

    </div>
    <input type="hidden" id="base_url" value="<?php echo BaseUrl::home('http'); ?>">
</div>
