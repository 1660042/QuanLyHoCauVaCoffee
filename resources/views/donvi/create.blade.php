@extends('layouts.default')
@section('content')
@include('common.notification')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Tạo mới đơn vị</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('dln.donvi.store') }}" method="post">
                @csrf
                <div class="box-body">
                    @error('name')
                    <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <label>Tên đơn vị</label>
                        <input type="text" class="form-control" name="name" placeholder="Điền vào tên đơn vị">
                    </div>
                    <div class="form-group">
                        <label>Hoạt động </label>
                        <input type="checkbox" name="status" value="1" class="flat-red" checked>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('dln.donvi.index') }}" class="btn btn-default">Quay lại</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection
@push('icheck_checkbox')
<script>
// $('input[type="checkbox"].flat-red').iCheck({
//       checkboxClass: 'icheckbox_flat-green',
// })
// $('input').on('ifChecked', function(e) {
//     $(this).val(1);
//     $(this).attr('checked', 'true');
// });
// $('input').on('ifUnchecked', function(e)) {
//     $(this).val(0);
//     $(this).attr('checked', 'false');
// }
// if($('input').prop('checked') == false) {
//     $(this).val(0);
// }
</script>
@endpush