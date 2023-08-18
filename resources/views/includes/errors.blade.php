@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h5><strong>Произошла ошибка.</strong></h5>

        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
