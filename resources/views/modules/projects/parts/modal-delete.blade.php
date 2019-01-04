<div class="modal fade" id="delete-project-id-{{ $project->project_id }}" tabindex="-1" role="dialog" aria-labelledby="delete-project-id-{{ $project->project_id }}Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-project-id-{{ $project->project_id }}Title">
                    <i class="fa fa-info-circle"></i> Are you sure you want to delete this project?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Project Title: </strong> {!! $project->project_title !!}<br>
                <strong>Website: </strong> {!! $project->website !!}<br>
                <strong>Email: </strong> {!! $project->email !!}<br>
                <strong>Telegram: </strong> {!! $project->telegram !!}<br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> No</button>
                <form action="{{ route('projects.destroy',  $project->project_id ) }}" method="post">
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