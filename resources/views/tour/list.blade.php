@extends('master')
@section('content')
    <!-- Page Heading Start -->
    <div class="page-heading">
        <h1><i class='fa fa-table'></i> Tour List</h1>
        <h3>Danh sách các tour đã tạo</h3>
    </div>
    <!-- Page Heading End-->
    <!-- Your awesome content goes here -->
    <div class="row">
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header transparent">
                    <h2>Tour Table</h2>
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                        <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="data-table-toolbar">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="toolbar-btn-action">
                                    <a href="{{route('createTour')}}" class="btn btn-success"><i
                                                class="fa fa-plus-circle"></i> Add new</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <form role="form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table data-sortable class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>No</th>  
                                <th>Tour Name</th>
                                <th>Vehicle</th>
                                <th>Start Location</th>
                                <th>End Location</th>
                                <th>People</th>
                                <th>Update|Delete</th>
                                
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($tour as $key=>$value)
                            <tr>
                                <td>{{$key}}</td>
                                <td><a href="{{route('tourDetails',$value['id'])}}"><strong>{{$value['name']}}</strong></a></td>
                                <td>{{$value['vehicle']}}</td>
                                <td>{{$value['startlocal']}}</td>
                                <td>{{$value['endlocal']}}</td>
                                <td>{{$value['number']}}</td>
                                
                                <td>
                                    <a href="#" class="btn btn-primary a-btn-slide-text">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        <span><strong>Update</strong></span>
                                    </a>
                                    <a href="{{route('deletetour', $value['id'])}}" class="btn btn-danger a-btn-slide-text">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        <span><strong>Delete</strong></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if(!$tour->isEmpty())
                         {{$value->paginate(10)}}
                        @else
                        
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

				            