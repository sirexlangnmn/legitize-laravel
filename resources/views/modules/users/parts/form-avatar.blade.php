<h5 class="mt-3">Profile Avatar</h5>
<div class="avatar-upload">
    <div class="avatar-edit">
        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="avatar"/>
        <label for="imageUpload"></label>
    </div>
    <div class="avatar-preview">
        <div 
            id="imagePreview" 
            style="background-image: url(
                @if(  Route::currentRouteName() == 'users.edit' )
                    {!! $user->avatar !== null ? asset('images/' . $user->avatar) : asset('images/default.jpg') !!}
                @else
                    {!! asset('images/default.jpg') !!}
                @endif
            );">
        </div>
    </div>
</div>