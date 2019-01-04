@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-star"></i> Campaigns
            <a href="{{ route('campaigns.create') }}" class="btn btn-outline-dark btn-sm float-right">
                <i class="fa fa-plus"></i> Add Campaign
            </a>
        </div>
        <div class="card-body">
            @include('modules.campaigns.list')
        </div>
    </div>
@endsection