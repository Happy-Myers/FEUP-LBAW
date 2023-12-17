<x-layout>
    <div class="container mb-4">
        <form method = "POST" action = "/products/{{$product->id}}" class="col-md-4 mx-auto" id="auth" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label text-white">Name</label>
              <input type="text" name="name" class="form-control" value="{{$product->name}}">
              @error('name')
              <p class = "text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="price" class="form-label text-white">price</label>
              <input type="number" name="price" class="form-control" value="{{$product->price}}" min="1">
              @error('price')
              <p class = "text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="description" class="form-label text-white">Description</label>
              <textarea class="form-control" name="description" rows="4" maxlength="300">{{$product->description}}</textarea>
              @error('description')
              <p class = "text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
                <label for="platform" class="form-label text-white">Platform</label>
                <select name="platform" class="form-control">
                    @foreach(App\Models\Platform::all() as $platform)
                        <option value="{{$platform->id}}" {{$product->platform == $platform ? 'selected' : ''}}>{{$platform->name}}</option>
                    @endforeach
                </select>
                @error('platform')
                <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label text-white">Categories</label>
                <select name="categories[]" class="form-control" multiple>
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{$category->id}}"{{in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                @error('categories')
                <p class = "text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label text-white"> Image </label>
                <input type="file" class="form-control" name="image"/>
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image2" class="form-label text-white"> Image2 </label>
                <input type="file" class="form-control" name="image2"/>
                @error('image2')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
  </x-layout>
  