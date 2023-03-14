<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="mt-2 ml-2">
                <h3>{{ucfirst($title)}} List</h3>
            </div>

            <div class="form-inline">
                <h5 class="ml-2 mr-5">

                    Show <select name="" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select> <Entries> </Entries>
                </h5>
                <div class="mt-4 ml-5">
                    <form class="row g-3" action="{{ $name }}">
                        <div class="col-auto">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>
