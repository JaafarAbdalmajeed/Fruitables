<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button style="border: none; border-radius: 5px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing data -->
                <form id="editForm">
                    <!-- Input fields for editing data -->
                        <input type="hidden" class="form-control" id="editInputId" name="id">
                    <div class="mb-3">
                        <label for="editInputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editInputName" name="name">
                    </div>
                    <!-- Add more input fields as needed -->
                    <button type="submit" id="edit-submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

