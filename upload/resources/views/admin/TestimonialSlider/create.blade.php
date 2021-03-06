@extends('layouts.admin')

@section('content')
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:  #095f59">
                <h3 class="panel-title">Add Testimonial Slider</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-info">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    {{--<input method="POST" action="{{ route('testimonials.store') }}"  role="form">--}}
                        {{--<form action="{{ url('task') }}" method="POST" class="form-horizontal"></form>--}}
                   <form method="POST" action="{{ route('testimonialslider.store') }}"  role="form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="title" id="name" class="form-control input-sm" placeholder="Testimonial Slider title">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select required name="status" >
                                        <option value="" hidden>Testimonials Slider Status</option>
                                        <option value="1">Enable</option>
                                        <option value="0">Disable</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea name="description" class="form-control input-sm" placeholder="Testimonial Slider Description"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                   <div class="input-group date" id="datetimepicker1">
                                     <input type="text" name="start_date" id="name" class="form-control input-sm" placeholder="Start Date">
                                        <span class="input-group-addon">
                                             <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                   </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input type="text" name="end_date" id="name" class="form-control input-sm" placeholder="End Date">
                                        <span class="input-group-addon">
                                             <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="submit"  value="Save" class="btn btn-success btn-block">
                                <a href="{{ route('testimonialslider.index') }}" class="btn btn-info btn-block">Cancel</a>
                            </div>
                        </div>
                   </form>
                </table>
            </div>
        </div>


        <script>
            $(document).ready(function(){
                $('#datetimepicker1').datetimepicker();
                $('#datetimepicker2').datetimepicker();
            });
        </script>

    </div>
@endsection


