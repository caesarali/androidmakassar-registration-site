<div class="form-row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="code">Code Promo <span class="text-danger">*</span></label>
            <input id="code" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="Unique Code Promo..." value="{{ old('code', $promo->code ?? '') }}" required>
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="event">Courses / Event <span class="text-danger">*</span></label>
            <select name="event_id" id="event" class="form-control @error('event_id') is-invalid @enderror" required>
                <option value="" hidden>Select courses / event</option>
                @foreach ($events as $item)
                    <option value="{{ $item->id }}" {{ old('event_id', $promo->event_id ?? '') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('event_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="from_date">From Date <span class="text-danger">*</span></label>
            <input type="date" name="from_date" id="from_date" class="form-control @error('from_date') is-invalid @enderror" value="{{ old('from_date', isset($promo) ? $promo->getOriginal('from_date') : '') }}">
            @error('from_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="to_date">To Date <span class="text-danger">*</span></label>
            <input type="date" name="to_date" id="to_date" class="form-control @error('to_date') is-invalid @enderror" value="{{ old('to_date', isset($promo) ? $promo->getOriginal('to_date') : '') }}">
            @error('to_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="discount">Discount <b>(%)</b> <span class="text-danger">*</span></label>
            <input type="number" max="100" maxlength="3" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', $promo->discount ?? '') }}" placeholder="Max: 100">
            @error('discount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    <label for="description">Description (optional)</label>
    <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Optional...">{{ old('description', $promo->description ?? '') }}</textarea>
</div>
