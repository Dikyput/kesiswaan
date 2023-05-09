<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{$title}}</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">{{$title}}</h6>
        </nav>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="btn btn-sl btn-danger btn-sl w-100 mt-1 mb-0 float-right"> <i class="fas fa-power-off text-white text-sm opacity-10"></i>Logout</button>
            </form>
      </div>
    </nav>