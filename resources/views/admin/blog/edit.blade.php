@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('blog.update')}}" method="post" enctype="multipart/form-data" name="editForm">
                        @csrf
                        <input type="hidden" value="{{$blog->id}}" name="blog_id">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Edit Blog</h5>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Author</label>
                                <div class="col-sm-9">
                                    <select name="author_id" id="" class="form-control">
                                        @foreach($authors as $author)
                                            <option value="{{$author->id}}">{{$author->author_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" value="{{$blog->title}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="slug" value="{{$blog->slug}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control "  name="description">{{$blog->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="col-sm-1">
                                    <img src="{{asset($blog->image)}}" alt="" class="img-fluid h-100 w-100">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Blog Type</label>
                                <div class="col-sm-9">
                                    <select name="blog_type" id="" class="form-control">
                                        <option value="popular">Popular</option>
                                        <option value="trending">Trending</option>
                                        <option value="latest">Latest</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" name="status" value="1">Published &nbsp;
                                    <input type="radio" name="status" value="2">Unpublished
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editForm'].elements['status'].value='{{$blog->status}}';
        document.forms['editForm'].elements['date'].value='{{$blog->date}}';
        document.forms['editForm'].elements['blog_type'].value='{{$blog->blog_type}}';
        document.forms['editForm'].elements['author_id'].value='{{$blog->author_id}}';
        document.forms['editForm'].elements['category_id'].value='{{$blog->category_id}}';
    </script>

@endsection
