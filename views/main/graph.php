<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

use dosamigos\chartjs\ChartJs;
use yii\helpers\BaseUrl;
use app\models\Todos;

?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h2 class="display-4">Todo in Graph</h2>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-2 mb-3">
            </div>
    
            <div class="col-lg-8 mb-3">

            <?php 

                echo ChartJs::widget([
                    'type' => 'pie',
                    'id' => 'todos_chart',
                    'options' => [
                        'height' => 400,
                        'width' => 400
                    ],
                    'data' => [
                        'labels' => ["In Progress", "Done"],
                        'datasets' => [
                            [
                                'label' => "My First dataset",
                                'backgroundColor' => "rgba(179,181,198,0.2)",
                                'borderColor' => "rgba(179,181,198,1)",
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => [$in_progress, $is_done]
                            ],
                        ]
                    ]
                ]);
            ?>

            </div>
    
            <div class="col-lg-2 mb-3">
            </div>
        </div>

    </div>

    <input type="hidden" id="base_url" value="<?php echo BaseUrl::home('http'); ?>">


</div>
