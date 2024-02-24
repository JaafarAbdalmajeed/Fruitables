<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                <button style="border: none; border-radius: 5px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="prductId">

                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="editDescription" name="description" maxlength="10"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="editPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="editPrice" name="price">
                    </div>

                    <div class="mb-3">
                        <label for="editQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="editQuantity" name="quantity">
                    </div>

                    <div class="mb-3">
                        <label for="editImage" class="form-label">Image</label>
                        <input class="form-control form-control-lg" id="editImage" name="image" type="file">
                    </div>

                    <div class="mb-3">
                        <label for="listCategoriesCreate">List Categories</label>
                        <select class="form-control " id="listCategoriesCreate" name="category_id">
                            <option value="">Choose</option>
                        </select>
                        <div>
                            <img id="editImage" src="" alt="Product Image" width="100">

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="edit-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
