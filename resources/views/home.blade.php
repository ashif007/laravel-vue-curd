@extends('layouts.app')

@section('content')
    <div class="container" xmlns:v-bind="http://www.w3.org/1999/xhtml">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <p class="text-center alert alert-danger"
                       v-bind:class="{'d-none': hasError }">
                        {{--                        <button type="button" class="close" data-dismiss="alert">x</button>--}}
                        Please fill all fields!
                    </p>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   required placeholder=" Enter some name" v-model="newItem.name">
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" id="age" name="age"
                                   required placeholder=" Enter your age" v-model="newItem.age">
                        </div>
                        <div class="form-group">
                            <label for="profession">Profession:</label>
                            <input type="text" class="form-control" id="profession" name="profession"
                                   required placeholder=" Enter your profession" v-model="newItem.profession">
                        </div>

                        <button class="btn btn-primary" id="name" name="name" @click.prevent="createItem()">
                            <span class="glyphicon glyphicon-plus"></span> ADD
                        </button>


                        <div class="box">
                            <div class="table table-borderless" id="table">
                                <table class="table table-borderless" id="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Profession</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tr v-for="item in items">
                                        <td>@{{ item.id }}</td>
                                        <td>@{{ item.name }}</td>
                                        <td>@{{ item.age }}</td>
                                        <td>@{{ item.profession }}</td>

                                        <td>
                                            <button data-toggle="modal" data-target="#myModal" id="show-modal"
                                                    @click="setVal(item.id, item.name, item.age, item.profession)"
                                                    class="btn btn-info">Edit
                                            </button>
                                        </td>
                                        <td>
                                            <button @click.prevent="deleteItem(item.id)" class="btn btn-danger">Delete
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Item</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <input type="hidden" disabled class="form-control" id="e_id" name="id"
                           required :value="this.e_id">
                    Name: <input type="text" class="form-control" id="e_name" name="name"
                                 required :value="this.e_name">
                    Age: <input type="number" class="form-control" id="e_age" name="age"
                                required :value="this.e_age">
                    Profession: <input type="text" class="form-control" id="e_profession" name="profession"
                                       required :value="this.e_profession">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <div slot="footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                        <button class="btn btn-info" @click="editItem()">
                            Update
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
