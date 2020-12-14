@extends('layouts/app2')

@section('content')

    <div class="container ">
        <div class="row ml-0 mr-0 mt-5 mb-5">
            @if(session()->has('msg'))
                <div class="alert alert-success">  {{session()->get('msg')}}</div>
            @endif
            <div class="col-12 ml-auto text-right">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add item</a>
            </div>
        </div>
        <div class="row ml-0 mr-0 ">
            <div class="col-12">
                <div class="border-primary-100 d-flex flex-row justify-content-end w-100">
                    {{(($item_with_modals->currentPage() * $item_with_modals->perPage())- $item_with_modals->perPage() )+1 }}
                    of {{$item_with_modals->total()}}
                </div>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">BRAND</th>
                        <th scope="col">MODAL</th>
                        <th scope="col">DATE  ADDED</th>
                        <th scope="col">ACTIONS</th>


                    </tr>
                    </thead>
                    <tbody>
                    @forelse($item_with_modals as $item)
                    <tr>

                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->amount}}</td>
                        @if($item->modal && $item->modal->brand)
                        <td id="{{$item->modal->brand->id}}" >{{$item->modal->brand->name}}</td>
                        @else
                            <td id="null">no brand detected</td>
                        @endif
                        @if($item->modal)
                        <td id="{{$item->modal->id}}">{{$item->modal->name}}</td>
                        @else
                            <td id="null">no model detected</td>
                        @endif
                        <td>{{$item->created_at->todatestring()}}</td>

                        <td>
                            <button class="btn btn-sm btn-primary editModal" >Edit</button>
                            <button class="btn btn-sm btn-primary deleteModal" >Delete</button>

                        </td>
                        @empty
                            <tr>
                                <td colspan="7" class="alert-danger alert">no item found</td>
                            </tr>
                        @endforelse

                    </tr>


                    </tbody>
                </table>
<div class="row ml-0 mr-0 ">
    <div class="col-12  d-flex justify-content-center flex-row">
    {{$item_with_modals->links()}}
    </div>
</div>

            </div>
        </div>
    </div>
{{--modal for adding  data--}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sm.home.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="row ml-0 mr-0">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="itemName" class="form-control" id="" placeholder="item name here">
                                        @error('itemName')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Amount</label>
                                        <input type="text" name="itemAmount" class="form-control" id="" placeholder="item amount here">
                                        @error('itemAmount')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select brand Name</label>
                                        <select class="form-control" name="brand_id" id="brandSelect">
                                            <option>Please Select</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" {{$brand->id == old('brand_id')? "selected" : null}}>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('modal_id')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select modal Name</label>
                                        <select class="form-control" name="modal_id" id="modalSelect">
                                            <option>Please Select</option>
                                            @foreach($brands as $brand)
                                                @foreach($brand->modal as $modal)
                                                @if($modal)
                                                <option value="{{$modal->id}}" {{$modal->id == old('modal_id')? "selected" : null}}>{{$brand->name}} : {{$modal->name}}</option>
                                                    @else
                                                        <option value="null" >{{$brand->name}} : no modal detected</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                        @error('modal_id')
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
{{--  add modal ends  --}}


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
                                        <label for="">Name</label>
                                        <input type="text" name="itemName" class="form-control" id="editItemName" placeholder="item name here">
                                        @error('itemName')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Amount</label>
                                        <input type="text" name="itemAmount" class="form-control" id="editItemAmount" placeholder="item amount here">
                                        @error('itemAmount')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">brand Name</label>
                                        <select class="form-control " id="itemBrandOptions" name="brand_id">
                                            <option>Please Select</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" >{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">modal Name</label>
                                        <select class="form-control " id="itemModalOptions" name="modal_id">
                                            <option>Please Select</option>
                                            @foreach($brands as $brand)
                                                @foreach($brand->modal as $modal)
{{--                     using if statement for just in case any brand doesn't have any modal yet                                --}}
                                                    @if($modal)
                                                        <option value="{{$modal->id}}" {{$modal->id == old('modal_id')? "selected" : null}}>{{$brand->name}} : {{$modal->name}}</option>
                                                    @else
                                                        <option value="null" >{{$brand->name}} : no modal detected yet</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                        @error('modal_id')
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
            $('.editModal').on('click',function(){
                //getting parent row
                var tr= $(this).closest('tr');
                //getting brand name
                var item=tr.find("td:eq(0)").text()
                //getting item record id
                var item_id=tr.find("th:eq(0)").text();
                //getting item amount
                var amount=tr.find("td:eq(1)").text();
                //getting brand_id
                var brand_id=tr.find("td:eq(2)").attr('id');
                //getting modal_id
                var modal_id=tr.find("td:eq(3)").attr('id');
                //adding brand value to edit modal's input
                $('#editItemName').val(item);
                $('#editItemAmount').val(amount);
                //setting route
                var action="{{route('sm.home.update',":id")}}";
                var url= action.replace(':id',item_id)
                $('#updateForm').attr('action',url);
                //getting id of brand from table and adding to modal select
                $("#itemBrandOptions option").each(function()
                {
                    //checking app options with value match
                    if(brand_id==$(this).val()){
                        // setting select attribute
                        $(this).attr("selected",'selected');
                    }else{
                        $(this).removeAttr('selected');
                    }
                });
                //getting id of modal from table and adding to modal select
                $("#itemModalOptions option").each(function()
                {
                    //checking app options with value match
                    if(modal_id==$(this).val()){
                        // setting modal select attribute
                        $(this).attr("selected",'selected');
                    }else{
                        $(this).removeAttr('selected');
                    }
                });
                //opening modal
                $('#editModal').modal('show');
            })
            $('.deleteModal').on('click',function(){
                //getting parent row
                var tr= $(this).closest('tr');
                // getting modal id
                var item_id=tr.find("th:eq(0)").text()
                // setting route
                var action="{{route('sm.home.destroy',":id")}}";
                var url= action.replace(':id',item_id);
                $('#deleteForm').attr('action',url);
                //showing modal
                $('#deleteModal').modal('show');
            })


        })


    </script>


@endsection
