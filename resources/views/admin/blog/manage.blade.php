@extends('admin.master')
@section('content')

    <div class="row">
        <div class="col-xl-12 ">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead class="table-light">
                                <tr class="text-center">
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Author Name</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Blog Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @foreach($blogs as $blog)
                                <tr class="align-middle">
                                    <td >{{$i++}}</td>
                                    <td>{{$blog->category_name}}</td>
                                    <td>{{$blog->author_name}}</td>
                                    <td>{{substr($blog->title,0,30)}}</td>
                                    <td>{{substr($blog->slug,0,30)}}</td>
                                    <td>{{substr($blog->description,0,30)}}</td>
                                    <td>
                                        <img src="{{asset($blog->image)}}" alt=" " class="product-box border">
                                    </td>
                                    <td>{{$blog->date}}</td>
                                    <td>{{$blog->blog_type}}</td>
                                    <td>{{$blog->status == 1? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                       <div  class="d-flex fs-6" >
                                           <a href="{{route('edit.blog',['id'=>$blog->id])}}" class="me-3 border-1 text-info"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill" ></i></a>

                                           @if($blog->status == 1)
                                               <a href="{{route('edit.status',['id'=>$blog->id])}}" class="me-3 border-1 text-info"   data-bs-toggle="tooltip" data-bs-placement="bottom" title="Published"><i class="bi bi-eye-fill" style="color:#0571FFFF"></i></a>
                                           @else
                                               <a href="{{route('edit.status',['id'=>$blog->id])}}" class="me-3 border-1 text-warning"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unpublished"><i class="bi bi-eye-slash-fill" style="color:#ff0404"></i></a>
                                           @endif

                                           <form action="{{route('blog.delete')}}" method="post">
                                               @csrf
                                               <input type="hidden" value="{{$blog->id}}" name="blog_id">
                                               <button type="submit" class="me-3 border-0 text-danger"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">  <i class="bi bi-trash-fill" ></i></button>
                                           </form>
                                       </div>
                                    </td>
                                </tr>


                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
