@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div>
                <div class="justify-content-center py-5">
                    <div class="text-white text-xl-center " style="font-family: 'Bookman Old Style';  "><h1>YOUR POSTS</h1></div>
                </div>
            </div>
        </main>

        <div class="justify justify-content-center">

    @foreach($posts as $post)
        <div class="row text-white">
            <div class="col-12">
                <div class="card my-3 card-grey-bg">
                    <div class="card-body">
                        <h5 class="card-title text-center"><a class="text-white font-weight-bold" href="/posts/{{$post->id}}">{{strtoupper($post->title)}} </a></h5>
                        <p class="card-text pt-3">{!! Str::limit(nl2br($post->content), 500) !!}</p>
                        <p class="card-text text-right pt-4"><small class="text-lightDark">Posted at {{$post->created_at}}</small></p>
                    </div>
                    <img src="" class="card-img-top " >
                </div>
            </div>

        </div>

    @endforeach

        </div>
    </div>
@endsection
