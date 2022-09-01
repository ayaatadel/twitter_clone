<div class="col-md-12 mb-3 col-4">


    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group" style="background-color: rgba(255, 249, 249, 0.603) ; border-size=1px">
            <div class="row">
                <textarea placeholder="your tweet" class="form-control" name="body"></textarea>
            </div>
        </div>
        <div class="form-group mt-2">
            <div class="d-flex" style="justify-content: space-between;">
                {{-- <input type='file' name="image"> --}}
                <input type="file" name="images[]" multiple>

                <button class="btn btn-primary" style="color: black" type="submit"> tweet</button>
            </div>
        </div>
    </form>
</div>
