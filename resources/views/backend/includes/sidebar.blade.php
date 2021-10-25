@php
$currentRoute = Route::current()->getName();
@endphp
<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">

            <li class="menu-item {{ $currentRoute == 'my-dashboard' || $currentRoute == 'edit-profile' || $currentRoute ==  'change-password' ? 'menu-item-active' : '' }} " aria-haspopup="true">
                <a href="{{ route('my-dashboard') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa fa-home text-white" aria-hidden="true"></i>
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            <li class="menu-item menu-item-submenu {{  $currentRoute == 'landing-page-background-image' || $currentRoute == 'landing-page-question-list' || $currentRoute == 'landing-page-question-add' || $currentRoute == 'landing-page-question-edit'  ? 'menu-item-open menu-item-active' :'' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fa fa-paper-plane text-white"></i>
                    </span>
                    <span class="menu-text">Landing Page</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">

                        <li class="menu-item {{  $currentRoute == 'landing-page-background-image'  ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('landing-page-background-image') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot text-white">
                                    <span></span>
                                </i>
                                <span class="menu-text">Images</span>
                            </a>
                        </li>

                        <li class="menu-item {{  $currentRoute == 'landing-page-question-list' || $currentRoute == 'landing-page-question-add' || $currentRoute == 'landing-page-question-edit' ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('landing-page-question-list')}} " class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Question</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu {{  $currentRoute == 'result-background-image'   ? 'menu-item-open menu-item-active' :'' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fa fa-trophy  text-white"></i>
                    </span>
                    <span class="menu-text">Result Page</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">

                        <li class="menu-item {{  $currentRoute == 'result-background-image'  ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('result-background-image') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot text-white">
                                    <span></span>
                                </i>
                                <span class="menu-text">Images</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item {{ $currentRoute == 'users-management-list' || $currentRoute == 'users-management-add' || $currentRoute ==  'users-management-edit' ? 'menu-item-active' : '' }} " aria-haspopup="true">
                <a href="{{ route('users-management-list') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fab fa-adversal text-white" aria-hidden="true"></i>
                    </span>
                    <span class="menu-text">Adsense management</span>
                </a>
            </li>

            <li class="menu-item menu-item-submenu {{  $currentRoute == 'quiz-category-list'  || $currentRoute == 'quiz-category-add' || $currentRoute == 'quiz-category-edit' ||
                     $currentRoute == 'admin-quiz-view'  ||  $currentRoute == 'admin-quiz-list'  || $currentRoute == 'admin-quiz-add' || $currentRoute == 'admin-quiz-edit' ||
                    $currentRoute == 'quiz-type-list'  || $currentRoute == 'quiz-type-add' || $currentRoute == 'quiz-type-edit'
                      ? 'menu-item-open menu-item-active' :'' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="far fa-question-circle text-white"></i>
                    </span>
                    <span class="menu-text">Quiz</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">

                        <li class="menu-item {{  $currentRoute == 'quiz-type-list'  || $currentRoute == 'quiz-type-add' || $currentRoute == 'quiz-type-edit' ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('quiz-type-list') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot text-white">
                                    <span></span>
                                </i>
                                <span class="menu-text">Quiz Type</span>
                            </a>
                        </li>

                        <li class="menu-item {{  $currentRoute == 'quiz-category-list'  || $currentRoute == 'quiz-category-add' || $currentRoute == 'quiz-category-edit' ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('quiz-category-list') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot text-white">
                                    <span></span>
                                </i>
                                <span class="menu-text">Quiz Category</span>
                            </a>
                        </li>

                        <li class="menu-item {{  $currentRoute == 'admin-quiz-view'  ||  $currentRoute == 'admin-quiz-list'  || $currentRoute == 'admin-quiz-add' || $currentRoute == 'admin-quiz-edit' ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('admin-quiz-list') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot text-white">
                                    <span></span>
                                </i>
                                <span class="menu-text">Quiz</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside Menu-->
