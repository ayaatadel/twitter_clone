

<br>
<div class="form-group">
<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label class='form-control' > Post Body </label>
    <br>
    <textarea name="body" class="form-control"></textarea><br>
    <div  class='form-group'>
        <input type='file' name="image">
        <button class="btn btn-primary" type="submit"> Post</button>
    </div>
</form>
