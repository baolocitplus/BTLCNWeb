@extends('master')
@section('content')

<div class="row">

    <div class="widget">
        <div class="widget-content padding">
            <div id="basic-form">


                @if (Session::has('thongbao'))
                <div class="alert alert-info">{{ Session::get('thongbao') }}</div>
                @endif
                <form id="createtour1" method="POST" name="frmMr" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Tên tour</label>
                                <input type="text" name="tourname" id="tourname" class="form-control"
                                placeholder="Tên tour">
                                <div id="errorTourName" class="contentError"></div>
                            </div>
                            <div class="form-group">
                                <label>Phương tiện</label>
                                <input type="text" name="vehicle" id="vehicle" class="form-control"
                                placeholder="Phương tiện">
                                <div id="errorVehicle" class="contentError"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <textarea type="text" name="short_description" id="short_description"
                                class="form-control" style="height: 105px"
                                placeholder="Mô tả ngắn"></textarea>
                                <div id="errorShortDescription" class="contentError"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Điểm đi</label>
                                <input type="text" name="startlocal" id="startlocal" class="form-control"
                                placeholder="Điểm đi">
                                <div id="errorStartLocal" class="contentError"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Điểm đến</label>
                                <input type="text" name="endlocal" id="endlocal" class="form-control"
                                placeholder="Điểm đến">
                                <div id="errorEndLocal" class="contentError"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giới thiệu</label>
                                <textarea type="text" name="overview" id="overview" class="form-control"
                                style="height: 105px" placeholder="Giới thiệu"></textarea>
                                <div id="errorOverView" class="contentError"></div>
                            </div>

                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group" >
                                <label for="exampleInputEmail1">Số người</label>
                                <div class="row">
                                    <div class="col-sm-10 col-md-10">
                                        <input type="number" name="number" id="number" class="form-control"
                                        placeholder="Nhấp số lượng người">
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        <h5><b>Người</b></h5>
                                    </div>
                                </div>
                                <div id="errorNumber" class="contentError"></div>
                            </div>
                            
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chính sách</label>
                                <textarea type="text" name="policy" id="policy" class="form-control"
                                style="height: 180px" placeholder="Chính sách"></textarea>
                                <div id="errorPolicy" class="contentError"></div>
                            </div>
                            

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <table data-sortable class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ngày khởi hành</th>  
                                            <th>Ngày kết thúc</th>
                                            <th>Giờ đến</th>
                                            <th>Giá người lớn</th>
                                            <th>Giá trẻ em</th>  
                                            <th></th>      
                                        </tr>
                                    </thead>
                                    <tbody id="dynamic_field">
                                        <tr id="multischedule" class="multischedule" >
                                            <td><input type="date" id="timestart" name="timestart[]" placeholder="Nhập ngày khởi hành" class="form-control dpd3"/></td>
                                            <td><input type="date" id="timeend" name="timeend[]" placeholder="Nhập ngày kết thúc"  class="form-control dpd3"/></td>
                                            <td><input type="time" id="hourstart" name="hourstart[]" placeholder="Nhập ngày kết thúc" class="form-control dpd3"/></td>
                                            <td><input type="number" id="adultprice" name="adultprice[]" placeholder="Nhập giá người lớn" class="form-control dpd3"/></td>
                                            <td><input type="number" id="childprice" name="childprice[]" placeholder="Nhập giá trẻ em" class="form-control dpd3"/></td>
                                            <td><button type="button" name="add" id="add" class="btn-success" style="padding: 5px; width:50%;">+</button></td>
                                        </tr>

                                    </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div id="errorFileInput" class="contentError"></div>
                                            <div class="dropzone" id="my-dropzone" name="myDropzone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 btn-create" >
                                        <button type="submit" id="sbmtbtn" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection





