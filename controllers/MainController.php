<?php

namespace app\controllers;

use app\models\Tuser;
use app\models\Todos;
use yii\web\Controller;

use kartik\mpdf\Pdf;

use yii\web\Response;
use yii\db\Query;
use Yii;



class MainController extends Controller {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {

        // $this->layout = FALSE;
        $this->layout = "new_main";
        return $this->render('index');

    }

    public function actionRegister() {
        $this->layout = "new_main";
        return $this->render('register');

    }

    public function actionRegprocess() {
        $nama = Yii::$app->request->post("nama");
        $email = Yii::$app->request->post("email");
        $pwd = Yii::$app->request->post("password");
        $hash_password = Yii::$app->getSecurity()->generatePasswordHash($pwd);
        $tanggal = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');

        $new_user = new Tuser();
        $new_user->nama = $nama;
        $new_user->email = $email;
        $new_user->pwd = $hash_password;
        $new_user->created_at = $tanggal;
        $new_user->type = "reguler";
        $new_user->is_deleted = 0;

        if ($new_user->save()) {

            $response = [
                'status' => true,
                'message' => 'User has been added!'
            ];

        } else {

            $response = [
                'status' => false,
                'message' => 'Fail, error detail :' . $new_user->errors
            ];

        }

        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => $response
        ]);

    }

    public function actionLogin() {
        $email = Yii::$app->request->post("email");
        $password = Yii::$app->request->post("password");

        $user_login = Tuser::find()
                        ->where(['email' => $email])
                        ->one();
        
        if ($user_login) {

            $check_password = Yii::$app->getSecurity()->validatePassword($password, $user_login->pwd);
            if ($check_password) {
                $response = [
                    'status' => true,
                    'message' => 'User can access this app!',
                    'data' => [
                        "userid" => $user_login->userid,
                        "nama" => $user_login->nama,
                        "email" => $user_login->email
                    ]    
                ];

                Yii::$app->session->set("userid", $user_login->userid);
                // $this->session["userid"] = $user_login->userid;
                // $session->open();
                // $session['userid'] = $user_login->userid;
    
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Login and password not match!'
                ];
            }

        } else {
            $response = [
                'status' => false,
                'message' => 'Can not find this user!'
            ];

        }

        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => $response
        ]);

    }

    public function actionTodos() {

        $this->layout = "header_todos";
        return $this->render('todos');
    
    
    }

    public function actionAddtodo() {

        $response = [];
        $title = Yii::$app->request->post("title");
        $description = Yii::$app->request->post("description");
        $userid = Yii::$app->request->post("userid");

        $new_todo = new Todos();
        $new_todo->title = $title;
        $new_todo->description = $description;
        $new_todo->created_at = Yii::$app->formatter->asDate("now", "yyyy-MM-dd");
        $new_todo->updated_at = Yii::$app->formatter->asDate("now", "yyyy-MM-dd");
        $new_todo->is_done = 0;
        $new_todo->userid = $userid;

        if ($new_todo->save()) {
            $response = [
                'status' => true,
                'message' => 'Add todo data!'
            ];

        } else {
            $response = [
                'status' => false,
                'message' => $new_todo->errors
            ];
        }

        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => $response
        ]);

    }

    public function actionGettodos() {

        $response = [];
        $userid = Yii::$app->request->get("userid");

        $todos = Todos::find()
                        ->where(['userid' => $userid])
                        ->all();

        if ($todos) {
            $response = [
                'status' => true,
                'message' => 'Get todo data!',
                'data' => $todos    
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Get todo data!',
                'data' => []    
            ];
        }

        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => $response
        ]);

    }

    public function actionDeltodo() {

        $response = [];
        $todoid = Yii::$app->request->post("todoid");

        $todo = Todos::find()
                        ->where(['todoid' => $todoid])
                        ->one();

        if ($todo) {

            if ($todo->delete()) {
                $response = [
                    'status' => true,
                    'message' => 'Delete todo data!'
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Delete todo data error!'
                ];
            }
        }


        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => $response
        ]);
        

    }

    public function actionDonetodo() {

        $response = [];
        $todoid = Yii::$app->request->post("todoid");

        $todo = Todos::find()
                        ->where(['todoid' => $todoid])
                        ->one();

        if ($todo) {

            $todo->updated_at = Yii::$app->formatter->asDate("now", "yyyy-MM-dd");
            $todo->is_done = 1;
            if ($todo->save()) {
                $response = [
                    'status' => true,
                    'message' => 'Update todo data!'
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => $todo->errors
                ];
            }
        }


        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => $response
        ]);

    }

    public function actionEdittodo() {

        $response = [];
        $todoid = Yii::$app->request->post("todoid");
        $title = Yii::$app->request->post("title");
        $description = Yii::$app->request->post("description");

        $todo = Todos::find()
                        ->where(['todoid' => $todoid])
                        ->one();

        if ($todo) {
            $todo->title = $title;
            $todo->description = $description;
            $todo->updated_at = Yii::$app->formatter->asDate("now", "yyyy-MM-dd");
            if ($todo->save()) {
                $response = [
                    'status' => true,
                    'message' => 'Update todo data!'
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => $todo->errors
                ];
            }
        }


        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => $response
        ]);

    }

    public function actionGraph() {

        $userid = Yii::$app->session->get("userid");

        $data['is_done'] = 0;
        $data['in_progress'] = 0;

        $todos = Todos::find()
            ->where(['userid' => $userid])
            ->all();

        for ($i=0; $i<count($todos); $i++) {
            if ($todos[$i]->is_done == 1) {
                $data['is_done'] = $data['is_done'] + 1; 
            } else {
                $data['in_progress'] = $data['in_progress'] + 1;
            }
        }
        $this->layout = "header_graph";
        return $this->render('graph', [ "is_done" => $data["is_done"], "in_progress" => $data["in_progress"]]);

    }

    public function actionReport() {

        $this->layout = "header_report";
        return $this->render('report');

    }

    public function actionGenreport($jenis, $userid) {

        $path = Yii::$app->request->pathInfo;

        $segment = explode("/", $path);

        if ($jenis == "XLS") {

            $file = \Yii::createObject([
                'class' => 'codemix\excelexport\ExcelFile',
                'sheets' => [
                    'Users' => [
                        'class' => 'codemix\excelexport\ActiveExcelSheet',
                        'query' => Todos::find()->select(['todoid', 'title', 'created_at', 'updated_at', 'is_done'])->where(["userid" => $userid]),
                        // 'query' => $rows,
                        'styles' => [
                            'A1:Z1000' => [
                                'font' => [
                                    'bold' => true,
                                    'color' => ['rgb' => '000000'],
                                    'size' => 12,
                                    'name' => 'Verdana'
                                ],
                            ],
                        ],
                    ]
                ]
            ]);

            $file->send('todos.xlsx');

        } else {

            $rows = Todos::find()->select(['todoid', 'title', 'created_at', 'updated_at', 'is_done'])->where(["userid" => $userid])->all();
            $content = "<h2>Todo List</h2>";
            $content = $content . "<br><hr><br>";
            $content = $content . "<table class='table'>";
            $content = $content . "<thead>";
            $content = $content . "<tr><th scope='col'>TodoId</th><th scope='col'>Title</th><th scope='col'>Created At</th><th scope='col'>Updated At</th><th scope='col'>Is Done</th></tr>";
            $content = $content . "</thead>";
            $content = $content . "<tbody>";
            $status = ['In Progress', 'Done'];
            foreach($rows as $row) {
                $content = $content . "<tr><td>".$row->todoid."</td><td>".$row->title."</td><td>".$row->created_at."</td><td>".$row->updated_at."</td><td>".$status[$row->is_done]."</td><td>";
            }
            $content = $content . "</tbody></table>";

            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_CORE, 
                // A4 paper format
                'format' => Pdf::FORMAT_A4, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT, 
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER, 
                // your html content input
                'content' => $content,  
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '.kv-heading-1{font-size:18px}', 
                 // set mPDF properties on the fly
                'options' => ['title' => 'Todo List Report'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['Todo List'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
            
            // return the pdf output as per the destination setting
            Yii::$app->response->format = Response::FORMAT_RAW;
            Yii::$app->response->headers->add('Content-Type', 'application/pdf');
            return $pdf->render(); 

        }
    }

    public function actionLogout() {

        Yii::$app->session->destroy();

        $this->layout = "new_main";
        return $this->render('index');
    }
    
}
