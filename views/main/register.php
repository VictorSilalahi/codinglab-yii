<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

use yii\helpers\BaseUrl;

?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Register</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3">
            </div>
            <div class="col-lg-4 mb-3">
                
            <form>
                <div class="mb-3">
                    <label for="txtNama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="txtNama">
                </div>
                <div class="mb-3">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="txtEmail" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="txtPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="txtPassword1">
                </div>
                <div class="mb-3">
                    <label for="txtPassword2" class="form-label">Retype Password</label>
                    <input type="password" class="form-control" id="txtPassword2">
                </div>
                <button type="button" class="btn btn-primary btn-Register">Register</button>
            </form>                
            <div class="col-lg-4">
            </div>
        </div>

    </div>
    <input type="hidden" id="base_url" value="<?php echo BaseUrl::home('http'); ?>">
</div>
