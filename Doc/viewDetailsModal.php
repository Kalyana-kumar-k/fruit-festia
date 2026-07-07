<div class="modal fade" id="viewDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty/kg</th>
                            <th>Price/kg in Rs</th>
                            <th>Price in Rs</th>
                        </tr>
                    </thead>
                    <tbody id="modalBody">
                        <tr>
                            <td colspan="4">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="deleteOrder()">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>