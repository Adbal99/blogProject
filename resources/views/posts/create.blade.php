@extends('layouts.app')

@section('content')

    <div class="container text-light">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h2 class="text-center font-weight-bold">ADD POST</h2>
                <hr>
                <form action="/posts" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="form-group ">
                        <label for="title">Caption:</label>
                        <input
                            type="text"
                            name="title" id="title" class="form-control" placeholder="Whats the title?"
                            value="{{old('title')}}">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-form-label">Add image to your post!</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                        <small class="text-danger"> {{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="content" class="pt-3">Content:</label>
                        <textarea class="form-control-range" name="content" id="content" rows="10"
                                  placeholder="What happend?">{{ old('content') }}</textarea>
                        @error('content')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-5">
                        <label for="tags[tag]" class="pb-2">Choose tags: </label>
                        <br>

                        <select name="tags[]" id="tags" class="custom-select" size="6" multiple="multiple">
                            <option disabled>Hold ctrl and click for multiply select </option>
                            <option disabled></option>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>

                    </div>


                    <button type="submit" class="btn btn-outline-light mt-4">Add post!</button>
                </form>
            </div>


            <div class="col-md-4 d-flex justify-content-end mt-5">

                <div id="accordion">

                    <div class="card border-dark" style="width: 13rem">
                        <a
                            class="card-link text-dark card-header border-dark text-center" data-toggle="collapse"
                            href="#toggle">
                            Actions
                        </a>

                        <div id="toggle" class="collapse show text-center" data-parent="#accordion">
                            <div class="card-body">
                                <a href="/posts/{{ auth()->id()}}-{{auth()->user()->slug()}}"
                                   class="text-dark">My Posts!</a>
                            </div>
                            <div id="toggle" class="collapse show" data-parent="#accordion">
                                <div class="card-body text-center">
                                    <a href="/profile/{{auth()->user()->id}}" class="text-dark">Back to profile..</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
