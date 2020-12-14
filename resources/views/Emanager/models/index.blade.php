@extends('layouts/app2')

@section('content')


    <div class="container ">
        <div class="row ml-0 mr-0 mt-5 mb-5">
            @if(session()->has('msg'))
                <div class="alert alert-success">  {{session()->get('msg')}}</div>
            @endif
            <div class="col-12 ml-auto text-right">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add modals</a>
            </div>
        </div>
        <div class="row ml-0 mr-0 ">
            <div class="col-12">
                <div class="border-primary-100 d-flex flex-row justify-content-end w-100">
                    {{(($modals->currentPage() * $modals->perPage())- $modals->perPage() )+1 }}
                    of {{$modals->total()}}
                </div>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">BRAND</th>
                        <th scope="col">DATE  ADDED</th>
                        <th scope="col">ACTIONS</th>


                    </tr>
                    </thead>
                    <tbody>
                    @forelse($modals as $modal)
                    <tr>
                        <th scope="row">{{$modal->id}}</th>
                        <td>{{$modal->name}}</td>
                        <td id="{{$modal->brand->id}}">{{$modal->brand->name}}</td>
                        <td>{{$modal->created_at->todatestring()}}</td>
                        <td>
                            <button class="btn btn-sm btn-primary editModals" >Edit</button>
                            <button  class="btn btn-sm btn-primary deleteModals" >Delete</button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="alert alert-danger">No models found</td>
                        </tr>
                @endforelse

                    </tbody>
                </table>
<div class="row ml-0 mr-0">
    <div class="col-12 d-flex justify-content-center flex-row">
        {{$modals->links()}}
    </div>
</div>

            </div>
        </div>
    </div>
    {{--modal for adding data--}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sm.modals.store')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row ml-0 mr-0">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Modal Name</label>
                                    <select class="form-control" name="brand_id">
                                        <option>Please Select</option>
                                        @foreach($brands as $brand)

                                            <option value="{{$brand->id}}" {{$brand->id == old('brand_id')? "selected" : null}}>{{$brand->name}}</option>

                                        @endforeach
                                    </select>
                                    @error('brand')
                                    {{$message}}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Modal Name</label>
                                    <input type="text" name="modalName" class="form-control" id="" placeholder="modal  here">
                                    @error('modalName')
                                    {{$message}}
                                    @enderror
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
    {{-- end modal for adding data--}}

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
                <form action="" method="post" id="updateForm" >
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="container">
                            <div class="row ml-0 mr-0">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Modal Name</label>
                                        <select class="form-control " id="brandOptions" name="brand_id">
                                            <option>Please Select</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" >{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Modal Name</label>
                                        <input type="text" name="modalName" class="form-control" id="editModalName" placeholder="modal  here">
                                        @error('modalName')
                                        {{$message}}
                                        @enderror
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

            $('.editModals').on('click',function(){
                //getting parent row
                var tr= $(this).closest('tr');
                //getting brand name
                var modal=tr.find("td:eq(0)").text()
                //getting modal record id
                var modal_id=tr.find("th:eq(0)").text();
                //getting brand_id
                var brand_id=tr.find("td:eq(1)").attr('id');
                //adding brand value to edit modal's input
                $('#editModalName').val(modal);
                //setting route
                var action="{{route('sm.modals.update',":id")}}";
                var url= action.replace(':id',modal_id)
                $('#updateForm').attr('action',url);
                $("#brandOptions option").each(function()
                {
                    //checking app options with value match
                    if(brand_id==$(this).val()){
                        console.log($(this).val())
                        $(this).attr("selected",'selected');
                    }else{
                        $(this).removeAttr('selected');
                    }

                });
                //opening modal
                $('#editModal').modal('show');
            })
            $('.deleteModals').on('click',function(){
                var tr= $(this).closest('tr');
                // getting modal id
                var modal_id=tr.find("th:eq(0)").text()
                // setting route
                var action="{{route('sm.modals.destroy',":id")}}";
                var url= action.replace(':id',modal_id);
                $('#deleteForm').attr('action',url);
                $('#deleteModal').modal('show');
            })
        })

    </script>
@endsection











