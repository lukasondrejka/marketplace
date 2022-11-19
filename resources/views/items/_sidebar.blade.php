<form method="GET" action="">
    <?php
    $categories = [
        [ "id" => 0, "name" => "All categories", "slug" => "all" ],
        [ "id" => 1, "name" => "Electronics", "slug" => "electronics" ],
        [ "id" => 2, "name" => "Clothing & Accessories", "slug" => "clothing" ],
        [ "id" => 3, "name" => "Home & Garden", "slug" => "home-and-garden" ],
        [ "id" => 4, "name" => "Hobbies", "slug" => "hobbies" ],
    ];
    $category = $categories[0];
    ?>
    <!-- Search input -->
    <div class="mt-4">
        <div class="mb-3">
            <label for="searchInput" class="form-label">{{ __('Search') }}</label>
            <input type="email" class="form-control" id="searchInput" placeholder="">
        </div>
    </div>
    <!-- END Search input -->

    <!-- Categories -->
    <ul class="nav flex-column">
        @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link" href="{{ $category['slug'] }}">{{ $category['name'] }}</a>
            </li>
        @endforeach
    </ul>
    <!-- END Categories -->

    <div class="mt-3">

        <button type="submit" class="btn btn-primary w-100">Search</button>
    </div>

    <div class="mt-3">
    <a href="" class="btn btn-success btn-sm w-100">Add new item</a>
    </div>
</form>
