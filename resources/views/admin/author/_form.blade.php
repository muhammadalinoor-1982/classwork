<div class="form-group">
    <label class="col-md-12">Author Name</label>
    <div class="col-md-12">
        <input name="name" value="{{old('name',isset($author)?$author->name:null)}}" type="text" placeholder="Enter Author Name" class="form-control form-control-line @error('name') is-invalid @enderror">
    </div>
</div>
@error('name')
<div class=" text-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label class="col-md-12">Author Email</label>
    <div class="col-md-12">
        <input name="email" value="{{old('email',isset($author)?$author->email:null)}}" type="email" placeholder="Enter Author Email" class="form-control form-control-line @error('email') is-invalid @enderror">
    </div>
</div>
@error('email')
<div class=" text-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label class="col-md-12">Author Phone</label>
    <div class="col-md-12">
        <input name="phone" value="{{old('phone',isset($author)?$author->phone:null)}}" type="text" placeholder="Enter Author Phone" class="form-control form-control-line @error('phone') is-invalid @enderror">
    </div>
</div>
@error('phone')
<div class=" text-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label class="col-md-12">Address</label>
    <div class="col-md-12">
        <textarea rows="5" name="address" class="form-control form-control-line @error('address') is-invalid @enderror">{{old('address',isset($author)?$author->address:null)}}</textarea>
    </div>
</div>
@error('address')
<div class=" text-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label class="col-md-12">Author DOB</label>
    <div class="col-md-12">
        <input name="DOB" value="{{old('DOB',isset($author)?$author->DOB:null)}}" type="text" placeholder="Enter Author DOB" class="form-control form-control-line">
    </div>
</div>

<div class="form-group">
    <label class="col-md-12">Details</label>
    <div class="col-md-12">
        <textarea rows="5" name="details" class="form-control form-control-line @error('details') is-invalid @enderror">{{old('details',isset($author)?$author->details:null)}}</textarea>
    </div>
</div>
@error('details')
<div class=" text-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label class="col-md-12">Author Gender</label>
    @php
    if(old("gender")){
        $gender = old('gender');
    }elseif (isset($author)){
        $gender = $author->gender;
    }else{
        $gender = null;
    }
    @endphp
    <div class="col-md-12">
        <input name="gender" @if($gender=='male') checked @endif value="male" type="radio" id="male"><label for="male">Male</label>
        <input name="gender" @if($gender=='female') checked @endif value="female" type="radio" id="female"><label for="female">Female</label>
        <input name="gender" @if($gender=='others') checked @endif value="others" type="radio" id="others"><label for="others">Others</label>
    </div>
</div>
@error('phone')
<div class=" text-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label class="col-md-12">Image</label>
    <div class="col-md-12">
        @if(isset($author) && $author->image !=null)
            <img src="{{asset($author->image)}}" alt="">
        @endif
        <input name="image" type="file" placeholder="Upload Image" class="form-control form-control-line @error('image') is-invalid @enderror">
    </div>
</div>
@error('image')
<div class=" text-danger">{{ $message }}</div>
@enderror