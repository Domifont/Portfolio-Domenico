<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="my-5 display-1 t-blue">Registrati</h1>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row justify-content-center">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors -> all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
            <div class="col-8 border shadow rounded">
                <form class="m-5" method="POST" action="{{route('register')}}">
					@csrf
                    <div class="mb-3">
                        <label class="form-label">Name </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email </label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Conferma Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <p class="small pe-2">Sei già registrato? <a href="{{route('login')}}">Accedi</a></p>
                    <button type="submit" class="btn btn-perso">Completa Registrazione</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>