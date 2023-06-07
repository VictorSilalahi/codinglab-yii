<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

use yii\helpers\BaseUrl;

?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h2 class="display-4">Todo List</h2>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-2 mb-3">
            </div>
            <div class="col-lg-8 mb-3">
                <button class="btn btn-success btn-add" style="width: 100%">Tambah Todo</button>
                <br><br>
                <div  id="divTodos">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Featured
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">
                                <p>
                                    <button class="btn btn-warning btn-edit">Edit</button>&nbsp;<button class="btn btn-info btn-done">Done</button>&nbsp;<button class="btn btn-danger btn-delete">Delete</button>
                                </p>
                            </li>
                        </ul>
                    </div>       
                    <br>

                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Featured
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                        </ul>
                    </div>       
                </div>

            </div>
            <div class="col-lg-2 mb-3">
            </div>
        </div>

    </div>

    <input type="hidden" id="base_url" value="<?php echo BaseUrl::home('http'); ?>">

    <!-- Modal -->
    <div class="modal fade" id="modalAddEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titleModalAddEdit"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="form-control">
                <label>Title</label>
                <input type="text" id="txtTitle" class="form-control">
                <label>Description</label>
                <input type="text" id="txtDescription" class="form-control">
            </form>
            <input type="hidden" id="todoid">
            <input type="hidden" id="jenis">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-simpan-todo">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</div>
