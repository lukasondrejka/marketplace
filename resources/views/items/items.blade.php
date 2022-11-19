<x-app-layout>
    <div class="container" style="margin-top: -60px">
        <div class="row">
            <!-- Sidebar col -->
            <div class="col-lg-3">
                <div class="sticky-top">
                    <div class="navbar-spacer"></div>
                    @include('items._sidebar')
                </div>
            </div>
            <!-- END Sidebar col -->

            <!-- Items col -->
            <div class="col-lg-9">
                <div class="navbar-spacer mt-4"></div>

                @include('items._item-card')
                @include('items._item-card')
                @include('items._item-card')

                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>

            </div>
            <!-- END Items col -->

        </div>
    </div>
</x-app-layout>
