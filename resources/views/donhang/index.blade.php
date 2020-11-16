@extends('layouts.default')
@section('content')
@include('common.notification')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">List categories</h3> -->
              <div class="create box-title">
                <a class="btn btn-primary" href="{{ route('banhang.order.create') }}"><i class="fa fa-plus-circle"></i> Create &nbsp;</a>
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
                    <th class="text-center">Tên</th>
                    <th class="text-center">Số điện thoại</th>
                    <th class="text-center">Ngày tạo</th>
                    <th class="text-center">Người tạo</th>
                    <th class="text-center">Ngày sửa</th>
                    <th class="text-center">Người sửa</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Tác vụ</th>
                </tr>
				@foreach($donHang as $dh)
                    <tr>
                        <td class="text-center">#{{ $dh->id }}</td>
                        <td class="text-center">{{ $dh->name }}</td>
                        <td class="text-center">{{ $dh->status }}</td>
                        <td class="text-center">{{ $dh->type_product_fk }}</td>
                        <td class="text-center">{{ $dh->price }}</td>
                        <td class="text-center">{{ $dh->created_at }}</td>
						<td class="text-center">{{ $dh->created_by }}</td>
						<td class="text-center">{{ is_null($dh->updated_by) || strlen($dh->updated_by) == 0 ? "" : $dh->updated_at }}</td>
						<td class="text-center">{{ $dh->updated_by }}</td>
                        </td>
                        <td class="text-center">
                            <!-- <a href="{{ route('dln.donhang.edit', [$dh->id]) }}" class="btn-sm btn-primary"><i class="fa fa-edit"></i> Sửa</a> -->
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