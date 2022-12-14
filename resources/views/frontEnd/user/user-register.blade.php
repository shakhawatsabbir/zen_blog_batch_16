@extends('frontEnd.master')


@section('title')
    contact
@endsection

@section('content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">
            <div class="row ">

            </div>
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Registration</h1>
                </div>
            </div>

            <div class="form mt-5">
                <form action="{{route('user.register')}}" method="post" role="form" class="col-md-8 mx-auto">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required>
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
