<div class="content-header ">
    <div class="row mb-2 mt-5">
        <div class="col-sm-6 ml-3 mr-5">
            <h1 class="m-0">{{ ucfirst($title) }}</h1>
        </div><!-- /.col -->
        <div class="mr-5">
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item mt-2 mr-2">
                    <button class="btn btn-default btn-lg mr-5">
                        <a class="link-color" href="{{ $title }}/create"> Add {{ucfirst($title)}} </a>
                    </button>
                    @if( $title === "positions")
                        <button class="btn btn-default btn-lg mr-5">
                            <a class="link-color" href="{{ $title }}/file-download"> Calculate Salaries </a>
                        </button>
                    @endif
                    
                </li>
            </ul>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
