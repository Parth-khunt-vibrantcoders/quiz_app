 <div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
       <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

            <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">
                {{ $header['title']}}
            </h1>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                @php
                    $count = count($header['breadcrumb']);
                    $temp = 1;
                @endphp

                @foreach($header['breadcrumb'] as $key => $value)

                    @php
                        $value = (empty($value)) ? 'javascript:;' : $value;
                    @endphp

                    @if($temp!=$count)

                        <li class="breadcrumb-item text-muted">
                            <a href="{{ $value }}" class="text-muted text-hover-primary">{{ $key }}</a>
                        </li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>

                    @else
                        <li class="breadcrumb-item text-dark">{{ $key }}</li>
                    @endif

                    @php
                        $temp = $temp+1;
                    @endphp

                @endforeach
            </ul>
            <!--end::Breadcrumb-->
       </div>
    </div>
 </div>
