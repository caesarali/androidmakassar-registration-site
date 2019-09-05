<div class="form-group">
    <label for="name">Courses / Events <span class="text-danger">*</span></label>
    <input id="name" class="form-control" name="name" placeholder="Courses or Event name..." value="{{ old('name', $courses->name ?? '') }}" required>
</div>
<div class="form-row">
    <div class="form-group col-md">
        <label for="category">Category <span class="text-danger">*</span></label>
        <select name="category_id" id="category" class="form-control">
            <option value="" hidden>Select category</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}" {{ $item->id == old('category_id', $courses->category_id ?? '') ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md">
        <label for="location">Location <span class="text-danger">*</span></label>
        <select name="city_id" id="location" class="form-control">
            <option value="" hidden>Select location</option>
            @foreach ($cities as $item)
                <option value="{{ $item->id }}" {{ $item->id == old('city_id', $courses->city_id ?? '') ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md">
        <label for="price">Price <span class="text-danger">*</span></label>
        <input type="number" id="price" class="form-control" name="price" placeholder="Pricing..." value="{{ old('price', $courses->price ?? '') }}" required>
    </div>
</div>
<div class="form-group">
    <label for="descriptioin">Information about this courses / events :</label>
    <textarea id="description" class="form-control summernote" name="description">{!! old('description', $courses->description ?? '') !!}</textarea>
</div>
