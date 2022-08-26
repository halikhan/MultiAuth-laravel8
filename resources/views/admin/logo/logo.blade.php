@extends('admin.layout.admin_master')
@section('admin_content')

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Logo List</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Logo List
                <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                    data-target="#modaldemo3">Add New</a>
            </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Logo Type</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                 @if ($row->type == 1)
                                 Favicon
                                @elseif ($row->type == 2)
                                Black Logo
                                @elseif ($row->type == 3)
                                White Logo
                                @endif </td>
                                <td> <img src="{{ URL::to($row->logo_image) }}" height="70px;" width="80px;"> </td>
                                <td>
                                    <a href="{{ route('edit.logo',$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                    {{-- <a href="{{ route('delete.brand',$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a> --}}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->




    </div><!-- sl-mainpanel -->



    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Logo</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('store.logo') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            {{-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Brand" name="brand_name"> --}}

                            <label class="form-control-label">Logo Type: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" id="exampleInputEmail1" data-placeholder="Choose country" name="type">
                                {{-- <option selected readable>Select Logo Type:</option> --}}
                                <option value="1">Favicon</option>
                                <option value="2">Black Logo</option>
                                <option value="3">White Logo</option>
                            </select>

                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Logo Image</label>
                            <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Website Logo"
                                name="logo_image">

                        </div>



                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Sumbit</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->



@endsection
