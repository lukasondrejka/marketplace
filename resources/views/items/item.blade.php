<x-app-layout>
    <div class="container">
        <div class="card item-card-block mb-3 mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="p-4">
                        <img src="images/notebook.jpg" class="img-fluid rounded item-img" alt="Item image">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body pl-0 p-4">
                        <h1 class="card-title">Notebook</h1>
                        <p class="card-text"><small class="text-muted">Electronics</small></p>
                        <p class="card-text"><small class="text-muted">Created 1 hour ago</small></p>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis ante non magna feugiat, sed euismod neque aliquet. Nulla facilisi. Nulla et consequat ipsum. Suspendisse libero diam, fringilla at tempor in, semper a odio. Pellentesque placerat mauris et nisi mattis vulputate. Pellentesque posuere dictum ex, non sodales massa euismod non. Proin elementum nibh eu quam laoreet, imperdiet dapibus ex laoreet. Phasellus fermentum eu est ac dapibus. Quisque dapibus tempor nibh, ac pulvinar nisi finibus in. Mauris vitae volutpat ligula, sit amet blandit nisl. Mauris consectetur odio neque, ut posuere quam tempus vitae. Mauris porttitor elit vel lacus aliquam venenatis. Sed suscipit ligula sed tincidunt faucibus. Maecenas ullamcorper tincidunt orci, euismod vulputate urna pharetra vel. In varius, lacus et vulputate laoreet, mauris purus dignissim quam, eu finibus sapien lectus a tellus. Etiam maximus massa quis mauris rhoncus venenatis.
                        </p>
                    </div>
                </div>
            </div>
            <div class="clearfix p-4">
                <div class="float-end">
                    <h3><span class="badge bage-lg rounded-pill bg-primary">350 €</span></h3>
                </div>
            </div>
        </div>

        @include('users._user-card')
    </div>
</x-app-layout>
