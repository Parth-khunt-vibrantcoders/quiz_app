<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="">
          <h3>{{ $header['title']}}</h3>
          <ol class="breadcrumb">
            @php
              $count = count($header['breadcrumb']);
              $temp = 1;
            @endphp
                @foreach($header['breadcrumb'] as $key => $value)

                  @php
                      $value = (empty($value)) ? 'javascript:;' : $value;
                  @endphp

                    @if($temp!=$count)
                      <li class="breadcrumb-item">
                          <a href="{{ $value }}" class="" style="color: #4e5161;">
                              @if($temp == 1)
                                  <i class="fa fa-home" style="color: #4e5161;"></i>&nbsp;&nbsp;&nbsp;{{ $key }}
                              @else
                                  {{ $key }}
                              @endif
                          </a>
                      </li>
                      @else
                      <li class="breadcrumb-item ">{{ $key }}</li>
                    @endif

                    @php
                      $temp = $temp+1;
                    @endphp
                @endforeach
          </ol>
        </div>

      </div>
    </div>
  </div>
