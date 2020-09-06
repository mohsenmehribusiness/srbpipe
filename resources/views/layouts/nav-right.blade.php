<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="<?php url('admin/'); ?>">
          <span data-feather="home"></span>
          صفحه خلاصه <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="<?= Url('admin/'); ?>">
          <span data-feather="home"></span>
          خلاصه وضعیت<span class="sr-only"></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('images.index')}}">
          <span data-feather="camera"></span>
          گالری تصویر سایت
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('about.index')}}">
          <span data-feather="monitor"></span>
          اطلاعات کلی سایت
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('iso.index')}}">
          <span data-feather="clipboard"></span>
          گواهینامه
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('catalog.index')}}">
          <span data-feather="book-open"></span>
          کاتالوگ
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('laboratory.index')}}">
          <span data-feather="check-square"></span>
         {{$setting->laboratory}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('product.index')}}">
          <span data-feather="box"></span>
          {{$setting->product}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('section.index')}}">
          <span data-feather="feather"></span>
          تنظیم سایت
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('send.index')}}">
          <span data-feather="cast"></span>
          مدیریت ارتباطات
          @if($count_send!=0)
            <span class="badge badge-info badge-pill" style="margin-right:20px;font-size:102%;">
                {{$count_send}}
            </span>
          @endif
        </a>
      </li>
    </ul>
  </div>
</nav>