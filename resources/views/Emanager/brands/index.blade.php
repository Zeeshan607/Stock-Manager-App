@extends('layouts/app2')

@section('content')

    <div class="container ">
        <div class="row ml-0 mr-0 mt-5 mb-5">
            @if(session()->has('msg'))
                <div class="alert alert-success">  {{session()->get('msg')}}</div>
            @endif
            <div class="col-12 ml-auto text-right">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add brand</a>
            </div>
        </div>
        <div class="row ml-0 mr-0 ">
            <div class="col-12">
                <div class="border-primary-100 d-flex flex-row justify-content-end w-100">
                    {{(($brands->currentPage() * $brands->perPage())- $brands->perPage() )+1 }}
                    of {{$brands->total()}}
                </div>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">ITEMS COUNT</th>
                        <th scope="col">MODALS COUNT</th>
                        <th scope="col">DATE  ADDED</th>
                        <th scope="col">ACTIONS</th>


                    </tr>
                    </thead>
                    <tbody>
                    @forelse($brands as $brand)
                    <tr>
                        <th scope="row">{{$brand->id}}</th>
                        <td>{{$brand->name}}</td>
                        <td>{{\App\Models\item::where("brand_id",$brand->id)->count()}}</td>
                        <td>{{$brand->modal->count()}}</td>

                        <td>{{$brand->created_at->todatestring()  }}</td>
                        <td>
{{--                            data-toggle="modal" data-target="#editModal"--}}
                            <button  class="btn btn-sm btn-primary editBrand" >Edit</button>
                            <button class="btn btn-sm btn-primary deleteBrand" >Delete</button>

                        </td>


                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="alert alert-danger">sorry there is no brand to show</td>
                        </tr>

                    @endforelse


                    </tbody>
                </table>
                <div class="row ml-0 mr-0">
                    <div class="col-12 d-flex justify-content-center flex-row">
                        {{$brands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--modal for adding updating data--}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sm.brands.store')}}" method="post">
                    @csrf
                <div class="modal-body">
                     <div class="container">
                         <div class="row ml-0 mr-0">
                             <div class="col-12">
                                     <div class="form-group">
                                         <label for="">Name</label>
                                         <input type="text" name="brandName" class="form-control" id="" placeholder="Brand name here">
                                         @error('brandName')
                                         {{$message}}
                                         @enderror
                                     </div>
                             </div>
                         </div>
                     </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>

            </div>
        </div>
    </div>
{{--add modal ensd--}}
    {{--edit modal--}}

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLongTitle">Edit Items </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="updateForm">
                    @csrf
                    @method('PUT')
                <div class="modal-body">
                    <div class="container">
                        <div class="row ml-0 mr-0">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="brandName" class="form-control" id="editbrandName" placeholder="Brand name here">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{--    edit ends--}}
    {{-- delete confirmater model  --}}

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Are you sure you want to delete this record?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="" method="post" id="deleteForm">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Yes Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            //functions runs on click of edit button
            $('.editBrand').on('click',function(){
                var tr= $(this).closest('tr');
                var brand=tr.find("td:eq(0)").text()
                var brand_id=tr.find("th:eq(0)").text()
                $('#editbrandName').val(brand);
                var action="{{route('sm.brands.update',":id")}}";
               var url= action.replace(':id',brand_id)
                $('#updateForm').attr('action',url);
                $('#editModal').modal('show');
            })
            //functions runs on click of delete button button
            $('.deleteBrand').on('click',function(){
                var tr= $(this).closest('tr');
                // getting brand id to delete
                var brand_id=tr.find("th:eq(0)").text()
                // setting delete form route
                var action="{{route('sm.brands.destroy',":id")}}";
                var url= action.replace(':id',brand_id)
                $('#deleteForm').attr('action',url);
                $('#deleteModal').modal('show');
            })
        })

    </script>
    @endsection








