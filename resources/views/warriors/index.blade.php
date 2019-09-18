@extends('layouts.app2')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Start first warrior -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Name</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://picsum.photos/300?random" class="img-thumbnail" alt="Image First Warrior">
                        </div>
                    </div>
                    <div class="card-footer">
                        attribute
                    </div>
                </div>
            </div>
            <!-- End First warrior -->

            <!-- Start second Warrior -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Name</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://picsum.photos/300?random" class="img-thumbnail" alt="Image Second Warrior">
                        </div>
                    </div>
                    <div class="card-footer">
                        attribute
                    </div>
                </div>
            </div>
            <!-- End Second Warrior -->
        </div>
    </div>

    <div class="mx-auto py-4" style="width: 200px;">
        <button class="btn btn-block btn-primary">fight</button>
    </div>
    <!-- Start warriors Select -->
    <div class="p-3 mb-2 bg-white text-dark">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="https://picsum.photos/200?random" class="img-thumbnail" alt="Image Warrior">
                    </div>
                    <div class="card-footer text-center">
                        Name
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="https://picsum.photos/200?random" class="img-thumbnail" alt="Image Warrior">
                    </div>
                    <div class="card-footer text-center">
                        Name
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="https://picsum.photos/200?random" class="img-thumbnail" alt="Image Warrior">
                    </div>
                    <div class="card-footer text-center">
                        Name
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="https://picsum.photos/200?random" class="img-thumbnail" alt="Image Warrior">
                    </div>
                    <div class="card-footer text-center">
                        Name
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="https://picsum.photos/200?random" class="img-thumbnail" alt="Image Warrior">
                    </div>
                    <div class="card-footer text-center">
                        Name
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="https://picsum.photos/200?random" class="img-thumbnail" alt="Image Warrior">
                    </div>
                    <div class="card-footer text-center">
                        Name
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="https://picsum.photos/200?random" class="img-thumbnail" alt="Image Warrior">
                    </div>
                    <div class="card-footer text-center">
                        Name
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="https://picsum.photos/200?random" class="img-thumbnail" alt="Image Warrior">
                    </div>
                    <div class="card-footer text-center">
                        Name
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Warriors Select -->
@endsection