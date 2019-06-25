<div class="form-group">
    <label class="col-md-12">Category Name</label>
    <div class="col-md-12">
        <input name="name" value="{{old('name',isset($category)?$category->name:null)}}" type="text" placeholder="Enter Category Name" class="form-control form-control-line @error('name') is-invalid @enderror">
    </div>
</div>
@error('name')
<div class=" text-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label class="col-md-12">Details</label>
    <div class="col-md-12">
        <textarea rows="5" name="details" class="form-control form-control-line">{{old('details',isset($category)?$category->details:null)}}</textarea>
    </div>
</div>