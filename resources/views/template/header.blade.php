<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Chat</h5>
    <div class="dropdown" style="margin-right: 40px;">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            All users
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach($users as $el)
                <a class="dropdown-item" href="#">{{$el->name}}</a>
            @endforeach
        </div>
    </div>
</div>
