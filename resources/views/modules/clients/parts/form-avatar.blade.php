<h5 class="mt-3">Client Image</h5>
<div class="avatar-upload">
    <div class="avatar-edit">
        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image"/>
        <label for="imageUpload"></label>
    </div>
    <div class="avatar-preview">
        <div 
            id="imagePreview" 
            style="background-image: url(
                @if(  Route::currentRouteName() == 'clients.edit' )
                    {!! $client->image !== null ? asset('images/' . $client->image) : asset('images/default.jpg') !!}
                @else
                    {!! asset('images/default.jpg') !!}
                @endif
            );">
        </div>
    </div>
</div>