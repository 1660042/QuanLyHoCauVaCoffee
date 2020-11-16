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
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Reason</th>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                        <td>219</td>
                        <td>Alexander Pierce</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                </table>
            </div>
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
                    <div class="hoadon"><h3 class="box-title text-center">Sản phẩm</h3>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                              <tr>
                                <th class="text-center">Sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Đơn vị</th>
                                <th class="text-center">Giá (kvnd)</th>
                              </tr>
                                  <tr>
                                      <td class="text-center">Thuốc hero</td>
                                      <td class="text-center">
                                          <input type="text" style="width: 30%;">
                                      </td>
                                      <td class="text-center">
                                          <select name="" id="">
                                              <option value="">Gói</option>
                                              <option value="">Điếu</option>
                                          </select>
                                      </td>
                                      <td class="text-center">40</td>
                                  </tr>
                                  <tr>
                                    <td class="text-center">Câu cá giải trí vui chơi không quạu không giận nhé</td>
                                    <td class="text-center">
                                        <input type="text" style="width: 30%;">
                                    </td>
                                    <td class="text-center">
                                        <select name="" id="">
                                            <option value="">Gói</option>
                                            <option value="">Điếu</option>
                                        </select>
                                    </td>
                                    <td class="text-center">40</td>
                                </tr>
                                  <tr>
                                      <td class="text-center">Sting dâu</td>
                                      <td class="text-center">
                                        <input type="text" style="width: 30%;">
                                    </td>
                                    <td class="text-center">
                                        <select name="" id="">
                                            <option value="">Gói</option>
                                            <option value="">Điếu</option>
                                        </select>
                                    </td>
                                    <td class="text-center">40</td>
                                  </tr>
                                  
                            </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection
