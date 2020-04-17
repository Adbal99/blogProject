@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-3 p-5 text-white">
                <img class="rounded float-none  mw-100 border border-dark"
                     src="{{ $user->profile->publicImage() }}">
                <h4 class="text-center pt-3">{{ $user->profile->title }}</h4>

                <div class="font-weight-bold pt-3 text-center"><a class="text-white"
                                                                  href="{{ $user->profile->url }}">{{ $user->profile->url }}</a>
                </div>

                <hr class="my-3">
                <div class="text-center">

                    @can('update', $user->profile)
                        <p>
                            <button class="btn btn-outline-light" type="button" data-toggle="collapse"
                                    data-target="#menu" aria-expanded="false" aria-controls="menu">
                                Profile
                            </button>
                        </p>
                    @endcan
                </div>
                <div class="collapse border-dark col" id="menu">
                    <div class="card bg-light  card-body text-center">
                        <p><a class="text-dark font-weight-bold" href="/profile/{{$user->id}}/edit"> Edit Profile </a>
                        </p>
                        <p><a class="text-dark font-weight-bold" href="/posts/create"> Add post </a></p>
                    </div>
                </div>


            </div>

            <div class="col-sm-12 col-md-9 pt-5">


                <div class="jumbotron text-lightDark">
                    <h3 class="display-4 text-center font-weight-bolder" style="font-family: 'Bookshelf Symbol 7' ">
                        About Me!</h3>
                    <hr class="my-5" style="height: 1px; background-color: #d5d4d7; border: none;">
                    <p class="lead text-left">

                        @if($user->profile->description == null)
                            Make your profile interesting and add some description!
                        @else
                            {!! nl2br($user->profile->description) !!}
                        @endif
                    </p>
                    <hr class="my-5" style="height: 1px; background-color: #d5d4d7; border: none;">
                    <div class="text-center">
                        <a class="btn btn-lightDark btn-lg btn-block text-dark font-weight-bold"
                           href="/posts-{{auth()->user()->slug()}}"
                           role="button">See my posts!</a>
                    </div>
                </div>


            </div>
        </div>

    </div>





@endsection
