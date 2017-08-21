<!doctype html>
<html lang="en">
    @include('views.layouts.head')

    <body {{ body_class() }}>

        <div class="wrapper">

            @include('views.layouts.sidebar')

            <div class="main-panel">

                @include('views.layouts.nav')

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                            @yield('content')

                        </div>
                    </div>
                </div>


            </div>

        </div>

    </body>

    @include('views.layouts.scripts')

    {{ wp_footer() }}

    @include('views.layouts.ga')

</html>
