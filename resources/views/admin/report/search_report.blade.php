@extends('admin.admin_master')
@section('title')
    Search Report -Page
@endsection

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Search Report</h5>
            </div><!-- sl-page-title -->

            <div class="row ">
                <div class="col-md-4">
                    <div class="card pd-20 pd-sm-40">
                        <div class="table-wrapper">
                            <form action="{{ route('serachby.date') }}" method="POST">
                                @csrf
                                <div class="modal-body pd-20">
                                    <div class="form-group">
                                        <label for="">Search By Date</label>
                                        <input type="date" name="date" id="" class="form-control">
                                    </div>
                                </div><!-- modal-body -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                </div>
                            </form>

                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>
                <div class="col-md-4">
                    <div class="card pd-20 pd-sm-40">
                        <div class="table-wrapper">
                            <form action="{{ route('serachby.month') }}" method="POST">
                                @csrf
                                <div class="modal-body pd-20">
                                    <div class="form-group">
                                        <label for="">Search by Month</label>
                                        <select class="form-control" name="month" id="">
                                            <option hidden >choose month..</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="march">March</option>
                                            <option value="March">April</option>
                                            <option value="may">March</option>
                                            <option value="March">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                </div><!-- modal-body -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                </div>
                            </form>

                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>
                <div class="col-md-4">
                    <div class="card pd-20 pd-sm-40">
                        <div class="table-wrapper">
                            <form action="{{ route('serachby.year') }}" method="POST">
                                @csrf
                                <div class="modal-body pd-20">
                                    <div class="form-group">
                                        <label for="">Serach by Year</label>
                                        <select name="year" id="" class="form-control">
                                            <option hidden >Choose Year..</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                </div><!-- modal-body -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                </div>
                            </form>

                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>
            </div>




        </div><!-- sl-pagebody -->

        <footer class="sl-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2022. Easy Find. All Rights Reserved.</div>
                <div>Made by Easy Team.</div>
            </div>
        </footer>

    </div><!-- sl-mainpanel -->
@endsection
