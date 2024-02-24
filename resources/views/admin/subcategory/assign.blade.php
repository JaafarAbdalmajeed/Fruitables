<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignModalLabel">Edit Data</h5>
                <button style="border: none; border-radius: 5px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                            </div>
            <div class="modal-body">
                <!-- Form for editing data -->
                <form id="createForm">
                    <label for="listCategories">List Categories</label>
                    <select class="form-control m-2" id="listCategories" name="category_id">
                        <option value="">Choose</option>
                    </select>

                    <label for="listSubcategories">List Subcategories</label>
                    <select class="form-control m-2" id="listSubcategories" name="subcategory_id">
                        <option value="">Choose</option>
                    </select>

                    <button type="submit" id="assign-submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
