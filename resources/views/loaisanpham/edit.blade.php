@extends('layouts.default')
@section('content')
@include('common.notification')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Tạo mới loại sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('dln.loaisanpham.update', $loaiSanPham[0]->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="box-body">
                    @error('name')
                    <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <label>Tên loại sản phẩm</label>
                        <input type="text" class="form-control" name="name" value="{{ $loaiSanPham[0]->name }}" placeholder="Điền vào tên loại sản phẩm">
                        <input type="hidden" class="form-control" name="type" value="{{ $type }}">
                    </div>
                    <div class="form-group">
                        <label>Hoạt động </label>
                        <input type="checkbox" name="status" value="1" {{ $loaiSanPham[0]->status == 0 ? '' : 'checked' }}>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('dln.loaisanpham.index', $type) }}" class="btn btn-default">Quay lại</a>
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