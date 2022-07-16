


    {{--baho--}}
    <div id="myModal5" class="modal">
        <div class="modal-content">
            <span class="close" id="get">&times;</span>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2> baho </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{route('admin.baho')}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="hidden" id="xarid_id" name="id">
                                <div class="form-group">
                                    <strong>Baho</strong>
                                    <input type="number" name="baho" id="name" class="form-control mb-3">
                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>


