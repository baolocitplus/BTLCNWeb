@extends('master')
@section('content')

<!--  -->
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="widget transparent animated fadeInDown">
                <h2><strong>{{$tour->name}}</strong></h2>
                <h4>Quãng đường: {{$tour->startlocal}} đến {{$tour->endlocal}}</h4>
                <div class="gallery-wrap">
                    
                    @foreach ($tourimage as $value)
                    
                    <div class="column">
                        <div class="inner">
                            <a class="zooming" href="{{asset('images/tour/'.$value->image)}}" title="Image title here">
                                <div class="img-wrap">
                                    <img src="{{asset('images/tour/'.$value->image)}}"
                                         alt="Image gallery" title="Image title here" class="mfp-fade">
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">

        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="widget">
                <div class="widget-header transparent">
                    <h2><strong>Schedule</strong></h2>
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                        <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                    </div>
                </div>

                <div class="widget-content">
                    <div class="data-table-toolbar">
                        <div class="row">
                            <div class="col-md-4">
                                <form role="form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table data-sortable="" class="table table-hover table-striped"
                               data-sortable-initialized="true">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Time Start</th>
                                <th>Time End</th>
                                <th>Hour Come</th>
                                <th>Child Price</th>
                                <th>Adult Price</th>
                                <th data-sortable="false">Staff Gmail</th>
                                <th data-sortable="false">Staff Name</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($schedule as $schedules)
                            <tr>
                                <td><?php $i=1;echo($i);$i++?></td>
                                <td>{{date('d-m-Y', strtotime($schedules->timestart))}}</td>
                                <td>{{date('d-m-Y', strtotime($schedules->timeend))}}</td>
                                <td>{{$schedules->hourstart}}</td>
                                <td>{{$schedules->childprice}}</td>
                                <td>{{$schedules->adultprice}}</td>
                                <td>
                                    <select class="chosen" onchange="update_staff(this.value,{{$schedules->id}})">
                                        <option></option>
                                        @foreach($staff as $staffs)
                                        <option value="{{$staffs->id}}">{{$staffs->email}}</option>
                                        @endforeach
                                        
                                    </select>
                                </td>
                                <td>
                                    @if($schedules->staff_id)
                                    <a href="#"><div id="staffname">{{$schedules->staff->name}}
                                    </div></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="data-table-toolbar">
                        <ul class="pagination">
                            <li class="disabled"><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="widget">
                <div class="widget-content padding">
                    <ul id="demo1" class="nav nav-tabs">
                        <li class="active">
                            <a href="#tour-overview" data-toggle="tab" aria-expanded="false">Giới thiệu</a>
                        </li>
                        <li class="">
                            <a href="#tour-policy" data-toggle="tab" aria-expanded="true">Chính sách</a>
                        </li>
                        <li class="">
                            <a href="#tour-shortdescription" data-toggle="tab" aria-expanded="true">Mô tả ngắn</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tour-overview">
                            <p>{{$tour->overview}}</p>
                        </div> <!-- / .tab-pane -->
                        <div class="tab-pane fade " id="tour-policy">
                            <p>{{$tour->policy}}</p>
                        </div> <!-- / .tab-pane -->
                        <div class="tab-pane fade" id="tour-shortdescription">
                            <p>{{$tour->short_description}}</p>
                        </div> <!-- / .tab-pane -->
                    </div> <!-- / .tab-content -->

                </div>
            </div>
        </div>
    </div>



<style type="text/css">
    .table-responsive{
        overflow-x: inherit !important;
    }
</style>
@endsection