<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Data</h5>
                <button style="border: none; border-radius: 5px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for creating data -->
                <form id="createForm">
                    <!-- Input field for creating data -->
                    <div class="mb-3">
                        <label for="createInputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="createInputName" name="name">
                    </div>
                    <!-- Add more input fields as needed -->
                    <button type="submit" id="create-submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
