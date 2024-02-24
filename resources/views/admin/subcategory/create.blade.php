<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Data</h5>
                <button style="border: none; border-radius: 5px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    <div class="mb-3">
                        <label for="createInputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="createInputName" name="name">
                    </div>
                    <label for="listCategoriesCreate">List Categories</label>
                    <select class="form-control m-2" id="listCategoriesCreate" name="category_id">
                        <option value="">Choose</option>
                    </select>

                    <button type="submit" class="btn btn-primary" id="create-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
