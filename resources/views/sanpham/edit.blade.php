@extends('layouts.default')
@section('content')
@include('common.notification')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Tạo mới sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('dln.sanpham.update', $sanPham[0]->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="box-body">
                    @error('name')
                    <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" value="{{ $sanPham[0]->name }}" placeholder="Điền vào tên sản phẩm">
                        <input type="hidden" class="form-control" name="type" value="{{ $type }}">
					</div>
                    @if($type > 0)
					@error('cost_price')
                    <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <label>Giá nhập</label>
                        <input type="text" class="form-control" name="cost_price" value="{{ $sanPham[0]->cost_price }}" placeholder="Điền vào giá nhập sản phẩm">
					</div>
					@error('price')
                    <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" class="form-control" name="price" value="{{ $sanPham[0]->price }}" placeholder="Điền vào giá bán sản phẩm">
					</div>
                    @endif
					@error('type_product_fk')
                    <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group">
						<label>Loại sản phẩm</label>
						
                        <select class="form-control" name="type_product_fk">
						<option value="">Chọn loại sản phẩm</option>
							@foreach($loaiSanPham as $loaiSP)
							<option value="{{ $loaiSP->id }}" {{ $loaiSP->id == $sanPham[0]->type_product_fk ? 'selected' : '' }}>{{ $loaiSP->name }}</option>
							@endforeach
                  		</select>
					</div>
					@error('unit_fk')
                    <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
					<div class="form-group">
						<label>Đơn vị</label>
						<select class="form-control" name="unit_fk">
							<option value="">Chọn đơn vị</option>
							@foreach($donVi as $dv)
							<option value="{{ $dv->id }}" {{ $dv->id == $sanPham[0]->unit_fk ? 'selected' : '' }} >{{ $dv->name }}</option>
							@endforeach
                  		</select>
					</div>
					
                    <div class="form-group">
                        <label>Hoạt động </label>
                        <input type="checkbox" name="status" {{ $sanPham[0]->status == '1' ? 'checked' : '' }} value="1" class="flat-red" >
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('dln.sanpham.index', $type) }}" class="btn btn-default">Quay lại</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection
