@extends('layouts.app')
@section('content')


    <div class="container text-lightDark">

        <div class="row align-items-end">

            <div class="col-12 text-center my-4 h3">
                {{$post->title}}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-3 text-center">
                <img class="rounded float-none w-75 border border-dark p-1 mt-4 "
                     src="{{ $post->user->profile->publicImage() }}">
                <div>

                    <small class="mt-3">Posted by {{$post->user->username}}</small>
                </div>
            </div>
            <div class="col-6 justify-content-center mt-3">
                <h5 class="text-left">{!! nl2br($post->content) !!} </h5>


                @can('delete', $post)
                <div class="mt-5 text-right">
                    <form action="/posts/{{$post->id}}" method="post">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-outline-danger">DELETE POST</button>
                    </form>
                </div>
                @endcan

                <div class="text-right mt-7">
                    <small>Posted at {{$post->created_at}}</small>
                </div>
            </div>
        </div>


    </div>

@endsection
