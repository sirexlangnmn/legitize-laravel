<div class="modal fade" id="delete-client-id-{{ $client->client_id }}" tabindex="-1" role="dialog" aria-labelledby="delete-client-id-{{ $client->client_id }}Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-client-id-{{ $client->client_id }}Title">
                    <i class="fa fa-info-circle"></i> Are you sure you want to delete this client?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Project Title: </strong> {!! $client->project_id !!}<br>
                <strong>Firstname: </strong> {!! $client->client_firstname !!}<br>
                <strong>Lastname: </strong> {!! $client->client_lastname !!}<br>
                <strong>Middlename: </strong> {!! $client->client_middlename !!}<br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> No</button>
                <form action="{{ route('clients.destroy',  $client->client_id ) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button     
                        type="submit" 
                        class="btn btn-danger" 
                        data-toggle="tooltip" 
                        data-placement="bottom"
                        title="Deleting this role will affect other users on this role. do you want to proceed?">
                    <i class="fa fa-trash"></i> Yes! Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>