@extends('frontEnd.master')


@section('title')
    profile
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-4 mx-auto">
                    <div class="card shadow-sm border-0 overflow-hidden">
                        <div class="card-body">
                            <div class="profile-avatar text-center">
                                <img src="{{asset('frontEndAsset')}}/assets/img/user-image.png" class="rounded-circle shadow" width="120" height="120" alt="">
                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-5 gap-5 ">
                                <div class="text-center">
                                    <h4 class="mb-0">45</h4>
                                    <p class="mb-0 text-secondary">Reaction</p>
                                </div>
                                <div class="text-center">
                                    <h4 class="mb-0">86</h4>
                                    <p class="mb-0 text-secondary">Comments</p>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <h4 class="mb-1">{{$user->name}}</h4>
                                <p class="mb-0 text-secondary">Sydney, Australia</p>
                                <div class="mt-4"></div>
                                <h6 class="mb-1">{{$user->email}}</h6>
                                <p class="mb-0 text-secondary">{{$user->phone}}</p>
                            </div>
                            <hr>
                            <div class="text-start">
                                <h5 class="">About</h5>
                                <p class="mb-0">It is a fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem.</p>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                                Comments
                                <span class="badge bg-info rounded-pill">95</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                React
                                <span class="badge bg-info rounded-pill">75</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                Reply
                                <span class="badge bg-info rounded-pill">75</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
