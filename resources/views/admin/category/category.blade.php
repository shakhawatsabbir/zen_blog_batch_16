@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.create')}}" method="post">
                        @csrf
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Add Category</h5>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="category_name" id="inputEnterYourName" placeholder="Enter Your Name">
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
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        @php $i=1 @endphp
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->status ==1 ? 'Published' : 'Unpublished'}}</td>
                                <td >
                                    <div class="d-flex">
                                        <a href="{{route('category.edit',['id'=>$category->id])}}" class="border-1 me-3"><i class="bi bi-pencil-square" style="color:#01d9ff"></i></a>
                                        <form action="{{route('category.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$category->id}}" name="category_id">
                                            <button type="submit" class="border-0 "   onclick="return confirm('Are you sure delete category !!')"><i class="bi bi-trash-fill" style="color:#FF4501FF" ></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
