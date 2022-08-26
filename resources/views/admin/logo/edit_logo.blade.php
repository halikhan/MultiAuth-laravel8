@extends('admin.layout.admin_master')
@section('admin_content')


    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Logo Update</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">logo Update

            </h6>


            <div class="table-wrapper">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('update.logo', $brand->id) }}" enctype="multipart/form-data">
                    @csrf

                        <div class="modal-body pd-20">
                        <div class="form-group">
                            <label class="form-control-label">Logo Type: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" id="exampleInputEmail1" data-placeholder="Choose country"
                                name="type">

                                <option value="1" {{ $brand->type == '1' ? 'selected' : '' }}>Favicon</option>
                                <option value="2"{{ $brand->type == '2' ? 'selected' : '' }}>Black Logo</option>
                                <option value="3"{{ $brand->type == '3' ? 'selected' : '' }}>White Logo</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">Logo</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="{{ $brand->logo_image }}" name="logo_image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Old Brand Logo</label>
                            <img src="{{ URL::to($brand->logo_image) }}" height="70px;" width="90px;">
                            <input type="hidden" name="old_logo" value="{{ $brand->logo_image }}">

                        </div>



                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Update</button>

                    </div>
                </form>


            </div><!-- table-wrapper -->
        </div><!-- card -->




    </div><!-- sl-mainpanel -->





@endsection
