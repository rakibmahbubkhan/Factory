    <div class="container-fluid page-body-wrapper">
        <div class="content-wrapper">
            <div class="col-md-12 grid-margin stretch-card mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $qualification->title ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $qualification->description ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Tile1">Tile 1</label>
                            <input type="text" name="Tile1" class="form-control" id="Tile1" value="{{ old('Tile1', $qualification->Tile1 ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="Tile_description1">Tile Description 1</label>
                            <textarea name="Tile_description1" class="form-control" id="Tile_description1">{{ old('Tile_description1', $qualification->Tile_description1 ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Tile2">Tile 2</label>
                            <input type="text" name="Tile2" id="Tile2" class="form-control" value="{{ old('Tile2', $qualification->Tile2 ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="Tile_description2">Tile Description 2</label>
                            <textarea name="Tile_description2" id="Tile_description2" class="form-control">{{ old('Tile_description2', $qualification->Tile_description2 ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Tile3">Tile 3</label>
                            <input type="text" name="Tile3" id="Tile3" class="form-control" value="{{ old('Tile3', $qualification->Tile3 ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="Tile description3">Tile Description 3</label>
                            <textarea name="Tile_description3" id="Tile_description3" class="form-control">{{ old('Tile_description3', $qualification->Tile_description3 ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Tile4">Tile 4</label>
                            <input type="text" name="Tile4" id="Tile4" class="form-control" value="{{ old('Tile4', $qualification->Tile4 ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="Tile description4">Tile Description 4</label>
                            <textarea name="Tile_description4" id="Tile_description4" class="form-control">{{ old('Tile_description4', $qualification->Tile_description4 ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control-file">
                            @if(isset($qualification) && $qualification->thumbnail)
                                <img src="{{ asset('storage/' . $qualification->thumbnail) }}" alt="Thumbnail" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="video_link">Video Link</label>
                            <input type="text" name="video_link" id="video_link" class="form-control" value="{{ old('video_link', $qualification->video_link ?? '') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
