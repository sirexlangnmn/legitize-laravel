<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-users"></i> Project List
                <a href="{{ route('projects.create') }}" class="btn btn-outline-dark btn-sm float-right">
                <i class="fa fa-plus"></i> Add Project
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm data-table" id="users-table" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Project Title</th>
                            <th class="text-center">Website</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Telegram</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Project Title</th>
                            <th class="text-center">Website</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Telegram</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse( $projects as $project )
                        <tr>
                            <td class="text-center pt-3 pb-3">{!! $project->project_id !!}</td>
                            <td class="text-center pt-3 pb-3">{!! $project->project_title !!}</td>
                            <td class="text-center pt-3 pb-3">{!! $project->website !!}</td>
                            <td class="text-center pt-3 pb-3">{!! $project->email !!}</td>
                            <td class="text-center pt-3 pb-3">{!! $project->telegram !!}</td>
                            <td class="text-center pt-3 pb-3">
                                <div class="btn-group btn-group-sm">
                                    <a 
                                        href="{{ route('projects.show', $project->project_id) }}"
                                        class="btn btn-secondary text-white">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a 
                                        href="{{ route('projects.edit', $project->project_id) }}" 
                                        class="btn btn-secondary">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button 
                                        type="button" 
                                        class="btn btn-warning btn-secondary text-white"
                                        data-toggle="modal" data-target="#delete-project-id-{{ $project->project_id }}">
                                        <i class="fa fa-remove"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('modules.projects.parts.modal-delete')
                        @empty
                        <tr>
                            <td class="text-center pt-3 pb-3" colspan="6">No records found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>