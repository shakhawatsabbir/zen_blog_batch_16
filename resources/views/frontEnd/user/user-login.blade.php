@extends('frontEnd.master')


@section('title')
    log-in
@endsection

@section('content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">
            <div class="row ">

            </div>
            <div class="row">
                <div class="col-lg-5 text-center mb-2 mx-auto">
                    <h1 class="">Log In</h1>
                    <h5 class="">{{session('massage')}}</h5>
                </div>
            </div>

            <div class="form">
                <form action="" method="post" role="form" class="col-md-4 mx-auto">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter Your Phone or Email" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Your password" required>
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-info">Submit</button></div>
                </form>
            </div><!-- End Contact Form -->

        </div>
    </section>
@endsection
