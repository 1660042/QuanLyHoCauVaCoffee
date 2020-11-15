@extends('layouts.default')
@section('content')
@include('common.notification')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">List categories</h3> -->
              <div class="create box-title">
                <a class="btn btn-primary" href="{{ route('dln.donvi.create') }}"><i class="fa fa-plus-circle"></i> Create &nbsp;</a>
              </div>
              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th class="text-center">ID</th>
				  <th class="text-center">Tên đơn vị</th>
                  <th class="text-center">Trạng thái</th>
                  <th class="text-center">Ngày tạo</th>
                  <th class="text-center">Người tạo</th>
                  <th class="text-center">Ngày sửa</th>
                  <th class="text-center">Người sửa</th>
                  <th class="text-center">Tác vụ</th>
                </tr>
				@foreach($donVi as $dv)
                    <tr>
                        <td class="text-center">#{{ $dv->id }}</td>
                        <td class="text-center">{{ $dv->name }}</td>
                        <td class="text-center">{{ $dv->status }}</td>
                        <td class="text-center">{{ $dv->created_at }}</td>
						<td class="text-center">{{ $dv->created_by }}</td>
						<td class="text-center">{{ is_null($dv->updated_by) || strlen($dv->updated_by) == 0 ? "" : $dv->updated_at }}</td>
						<td class="text-center">{{ $dv->updated_by }}</td>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('dln.donvi.edit', $dv->id) }}" class="btn-sm btn-primary"><i class="fa fa-edit"></i> Sửa</a>
                            <!-- <a class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Delete</a> -->
                        </td>

                    </tr>
				@endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- <script type="text/javascript">

        function submitForm(i) {
        //alert(i);
          document.getElementById("frmDelete-1").submit();
        //alert(document.getElementById("frmDelete-"+i));
        }
    </script> -->


@endsection