@extends('layouts.default')
@section('content')
@include('common.notification')
<div class="row">
    <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách sản phẩm</h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="nav-tabs-custom">
                
                <ul class="nav nav-tabs">
                    @foreach($loaiSanPham as $loaiSP)
                    <li class="{{ $loaiSP->id == '1' ? 'active' : '' }}"><a href="#tab_{{ $loaiSP->id }}" data-toggle="tab">{{ $loaiSP->name }}</a></li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach($loaiSanPham as $loaiSP)
                    <div class="tab-pane {{ $loaiSP->id == '1' ? 'active' : '' }}" id="tab_{{ $loaiSP->id }}">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                <th>Tên sản phẩm</th>
                                    <th>Đơn vị</th>
                                    <th>Giá</th>

                                </tr>
                                @foreach($sanPham as $sp)
                                @if($sp->type_product_fk == $loaiSP->id)
                                <tr onclick="orderSP({{ $sp->id }}, {{ $sp->is_time }})">
                                    <td id="name_{{ $sp->id }}">{{ $sp->name }}</td>
                                    <td id="unit_{{ $sp->id }}">{{ $sp->getDonVi->name }}</td>
                                    <td id="price_{{ $sp->id }}">{{ $sp->price }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                    @endforeach
                  <!-- /.tab-pane -->
                </div>
                
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
         
        </div>
            <!-- /.box-body -->
    </div>
    <div class="col-xs-6" style="margin-left: -5px;">
        <div class="box">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Order</h3>
            </div>
            <form action="" method="post">
                <!-- @csrf -->
                <div class="box-body">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="">
                    </div>
                    <div class="hoadon" id="hoaDonDichVu"><h3 class="box-title text-center">Dịch vụ</h3>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th class="text-center">Dịch vụ</th>
                                    <th class="text-center">Thời gian bắt đầu</th>
                                    <th class="text-center">Thời gian kết thúc</th>
                                    <th class="text-center">Giá (kvnd)</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="hoadon" id="hoaDonSanPham"><h3 class="box-title text-center">Sản phẩm</h3>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th class="text-center">Sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Đơn vị</th>
                                    <th class="text-center">Giá (kvnd)</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

@push('orderSP') 
<script>
    function orderSP(id, isTime) {

        $hd = $("#hd_"+id).val();
        $num = $hd;
        console.log($hd);
        if(typeof $hd !== 'undefined') {
            $("#hd_"+id).val(parseInt($hd) + 1);
        } else if(typeof $hd === 'undefined') {
            let name = document.getElementById('name_'+id).textContent;
            let unit = document.getElementById('unit_'+id).textContent;
            let price = document.getElementById('price_'+id).textContent;
            $html = "<tr onclick='giamSoLuong(this)' ><td class='text-center'>"+name+"</td><td class='text-center'><input id='hd_"+id+"' value='1' type='text' style='width: 30%;'></td><td class='text-center'>"+unit+"</td><td class='text-center'><input type='text' value='"+price+"' style='width: 50%;'></td></tr>";
            var hoaDonSanPham = document.getElementById('hoaDonSanPham');
            $hdsp = $('#hoaDonSanPham');
            //alert(hoaDonSanPham);
            $hdChild = hoaDonSanPham.childNodes[1].nextElementSibling.childNodes[0].nextElementSibling.childNodes[1].childNodes[0];
            $($html).insertAfter($hdChild);
        } 
    }

    function giamSoLuong(r) {
        $soLuong = r.childNodes[1].childNodes[0].value;
        if($soLuong > 1) {
            r.childNodes[1].childNodes[0].value = parseInt($soLuong) - 1;
        } else {
            r.remove();
        }
    }

</script>
@endpush

@endsection


