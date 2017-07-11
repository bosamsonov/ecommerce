<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    {{--<a class="navbar-brand" href="#">Navbar</a>--}}

  <a class="navbar-brand" href="#">Navbar</a>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {!! (Request::url()==URL::route('admin.sites.index'))?'active':'' !!}">
                <a class="nav-link" href="{!! URL::route('admin.sites.index') !!}">
                    Sites
                    @if (Request::url()==URL::route('admin.sites.index'))
                        <span class="sr-only">(current)</span>
                    @endif
                </a>
            </li>
            <li class="nav-item {!! (Request::url()==URL::route('admin.pages.index'))?'active':'' !!}">
                <a class="nav-link" href="{!! URL::route('admin.pages.index') !!}">
                    Pages
                    @if (Request::url()==URL::route('admin.pages.index'))
                        <span class="sr-only">(current)</span>
                    @endif
                </a>
            </li>


        </ul>
    </div>
</nav>