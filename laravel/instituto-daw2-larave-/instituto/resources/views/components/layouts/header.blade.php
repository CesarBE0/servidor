<header class="h-header bg-header flex justify-between px-5 items-center">
  <img src="{{ asset("img/logo.png") }}" alt="logo" class="max-h-full">
  <h1 class="text-4xl text-blue-900">{{__("GESTION DEL INSTITUTO")}}</h1>
    <div>
  @auth
    <p>hola {{auth()->user()->name}}</p>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary cursor-pointer">{{__("Log Out")}}</button>
        </form>
  @endauth
  @guest
    <div>
        <a href="{{ route('login') }}"><button class="btn btn-primary cursor-pointer">{{__("Login")}}</button></a>
      <a href="{{ route('register') }}"><button class="btn btn-primary cursor-pointer">{{__("Register")}}</button></a>
    </div>
  @endguest
    </div>
    <x-lang/>
</header>
