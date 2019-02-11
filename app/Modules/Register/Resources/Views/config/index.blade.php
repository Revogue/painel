@extends('admin::index')




@section('content')
    <!-- Begin .page-tabs -->
    <div class="pl15 pr50">
        <h4> Configurações </h4>
        <hr class="alt short">


        <div class="row">

            <div class="col-md-6">

                <!-- Input Fields -->
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Standard Fields</span>
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Static Field</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <p class="form-control-static text-muted">email@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Standard</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input type="text" id="inputStandard" class="form-control"
                                               placeholder="Type Here...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSelect" class="col-lg-3 control-label">Select List</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <select class="form-control">
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="disabledInput" class="col-lg-3 control-label">Disabled</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input class="form-control" id="disabledInput" type="text"
                                               placeholder="A Disabled Form" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="textArea1">Text Area Expand</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <textarea class="form-control textarea-grow" id="textArea1" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="textArea2">Text Area</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <textarea class="form-control" id="textArea2" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="textArea3">Disabled Text Area</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <textarea class="form-control" id="textArea3" rows="3" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Field Icons -->
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Easy Icons</span>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <label class="col-md-2 text-right">With Icons</label>
                            <div class="col-md-10 ph30">
                                <div class="form-group">
                                    <div class="bs-component">
                                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                          </span>
                                            <input class="form-control" type="text" placeholder="Email address">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="bs-component">
                                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                          </span>
                                            <input class="form-control" type="password" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="bs-component">
                                        <div class="input-group">
                                            <input class="form-control" type="text" placeholder="Numbers">
                                            <span class="input-group-addon">00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="bs-component">
                                        <div class="input-group">
                                            <input class="form-control" type="password" placeholder="Money">
                                            <span class="input-group-addon">
                            <i class="fa fa-usd"></i>
                          </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
