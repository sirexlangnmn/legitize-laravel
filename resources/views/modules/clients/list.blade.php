  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-users"></i> Client List
                <a href="{{ route('clients.create') }}" class="btn btn-outline-dark btn-sm float-right">
                <i class="fa fa-plus"></i> Add Client
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm data-table" id="users-table" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Project Title</th>
                            <th class="text-center">Firstname</th>
                            <th class="text-center">Lastname</th>
                            <th class="text-center">MIddlename</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Project Title</th>
                            <th class="text-center">Firstname</th>
                            <th class="text-center">Lastname</th>
                            <th class="text-center">MIddlename</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse( $clients as $client )
                        <tr>
                            <td class="text-center pt-3 pb-3">{!! $client->client_id !!}</td>
                            <td class="text-center pt-3 pb-3">{!! $client->project_id !!}</td>
                            <td class="text-center pt-3 pb-3">{!! $client->client_firstname !!}</td>
                            <td class="text-center pt-3 pb-3">{!! $client->client_lastname !!}</td>
                            <td class="text-center pt-3 pb-3">{!! $client->client_middlename !!}</td>
                            <td class="text-center pt-3 pb-3">
                                <div class="btn-group btn-group-sm">
                                    <a 
                                        href="{{ route('clients.show', $client->client_id) }}"
                                        class="btn btn-secondary text-white">
                                    <i class="fa fa-eye"></i> View
                                    </a>
                                    <a 
                                        href="{{ route('clients.edit', $client->client_id) }}" 
                                        class="btn btn-secondary">
                                    <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button 
                                        type="button" 
                                        class="btn btn-warning btn-secondary text-white"
                                        data-toggle="modal" data-target="#delete-project-id-{{ $client->client_id }}">
                                    <i class="fa fa-remove"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('modules.clients.parts.modal-delete')
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>