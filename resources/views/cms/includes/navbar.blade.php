<!-- navbar -->
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <a class="navbar-brand" href="{{  URL('dashbord') }}">Nouh Store</a>
        <button class=" navbar-toggler" B="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent" style="margin-right: 20px ;">
            <ul class="navbar-nav ml-auto navbar-right-top">

                <a href="{{ url('/logout') }}" class="btn btn-primary">LOGOUT</a>

                <!-- <li class=" nav-item nav-user">
                            <a href="#" id=" navbarDropdownMenuLink2" aria-haspopup="true" aria-expanded="false">
                                LOGOUT
                            </a>
                            </li> -->
        </div>

        </ul>
</div>
</nav>
</div>
<!-- end navbar -->