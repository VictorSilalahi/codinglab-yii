<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

use yii\helpers\BaseUrl;

?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h2 class="display-4">Report</h2>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-2 mb-3">
            </div>
    
            <div class="col-lg-8 mb-3">

                <form>
                    <label>Pilih jenis report</label>
                    <select id="slcJenisReport" class="form-control">
                        <option value="PDF">PDF</option>
                        <option value="XLS">XLS</option>
                    </select>
                    <br>
                    <button class="btn btn-info float-md-end" id="btn-generate-report">Generate Report</button>
                </form>
            </div>
    
            <div class="col-lg-2 mb-3">
            </div>
        </div>

    </div>

    <input type="hidden" id="base_url" value="<?php echo BaseUrl::home('http'); ?>">


</div>
