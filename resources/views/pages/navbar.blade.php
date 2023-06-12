<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{$title}}</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">{{$title}}</h6>
        </nav>
        <a href="{{url('/datasiswa')}}" type="button" class="btn btn-primary position-relative m-2">
          Data Siswa On Proses
        </a>
        <span class="position-absolute top-20 start-100 translate-middle badge rounded-pill bg-danger">
        {{ $datasiswaproses }}
            <span class="visually-hidden">unread messages</span>
          </span>
      </div>
    </nav>