@extends('layouts.app')

@section('content')
    <div class="container text-white">


        <form action="/profile/{{ $user->id  }}" enctype="multipart/form-data" method="post">

            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-8 offset-2">

                    <div class="form-group row">
                        <label for="title" class="col-form-label">Edit Name</label>
                        <input
                            type="text"
                            name="title" id="title" class="form-control" placeholder="Whats Your name?"
                            aria-describedby="helpId" value="{{old('title') ?? $user->profile->title }}">

                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group row">
                        <label for="description" class="col-form-label">Edit description</label>
                        <textarea class="form-control" rows="5" id="description" name="description"
                                  placeholder="Say other Bloggers about yourself!"
                        >{{old('description') ?? $user->profile->description }}</textarea>
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group row">
                        <label for="url" class="col-form-label">Url</label>
                        <input
                            type="text"
                            name="url" id="url" class="form-control"
                            placeholder="Would u like to share with us some links?"
                            aria-describedby="helpId" value="{{old('url') ?? $user->profile->url }}">

                        @error('url')
                        <small class="text-danger text-right"> {{ $message }}</small>
                        @enderror

                    </div>


                </div>
                <div class="row offset-2">
                    <label for="image" class="col-form-label">Edit profile image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                    <small class="text-danger"> {{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="row pt-5 ">
                <div class="col-8 offset-2">
                    <button class="btn btn-lightDark btn-block text-dark font-weight-bold">Save changes!</button>
                </div>
            </div>
        </form>
    </div>

@endsection
