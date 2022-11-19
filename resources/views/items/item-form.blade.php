<x-app-layout>
    <div class="container">
        <div class="card item-card-block mb-3 mt-4 m-2">
            <form class="m-4">
                <h2>Add new item</h2>

                <div class="mb-3 mt-3">
                    <label for="titleInput" class="form-label">Title</label>
                    <input type="text" class="form-control" id="titleInput">
                </div>

                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Category</option>
                        <option value="1">Electronics</option>
                        <option value="2">Clothing & Accessories</option>
                        <option value="3">Home & Garden</option>
                        <option value="3">Hobbies</option>
                        <option value="3">Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="descriptionInput" class="form-label">Description</label>
                    <textarea class="form-control" id="descriptionInput" rows="8"></textarea>
                </div>

                <div class="row">
                    <div class="col-md mb-3 mt-1">
                        <label for="priceInput" class="form-label">Price</label>
                        <input type="number" min="0" class="form-control" id="priceInput">
                    </div>

                    <div class="col-md mb-3 mt-1">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
