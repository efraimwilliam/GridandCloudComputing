@extends('layouts.head')
@extends('layouts.dashboard')

<form action="/unggah" method="POST" attribute enctype="multipart/form-data">
@csrf
    <div class="post">
        <div id="column-1" class="post">
            <label for="myfile">Select a file:</label>
            <input type="file" name="post" id="myfile">
        </div>

        <div id="postpos" class="post">
            <input type="submit" id="buttonpost" value="post" />
        </div>
        <div id="postboxpos" class="post">
            <textarea placeholder="What's in your mind" 
                id="postbox" name="desc">
            </textarea>
        </div>
    </div>
</form>