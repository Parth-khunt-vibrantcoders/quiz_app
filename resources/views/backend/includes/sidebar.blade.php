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

            <li class="menu-item {{ $currentRoute == 'user-list'  ? 'menu-item-active' : '' }} " aria-haspopup="true">
                <a href="{{ route('user-list') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa fa-users text-white" aria-hidden="true"></i>
                    </span>
                    <span class="menu-text">Users List</span>
                </a>
            </li>

            <li class="menu-item {{ $currentRoute == 'start-quiz-image'  ? 'menu-item-active' : '' }} " aria-haspopup="true">
                <a href="{{ route('start-quiz-image') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa fa-hourglass-start" aria-hidden="true"></i>
                    </span>
                    <span class="menu-text">Start quiz page image</span>
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

            <li class="menu-item menu-item-submenu {{  $currentRoute == 'country-list'  || $currentRoute == 'country-add' || $currentRoute == 'country-edit' ||
                    $currentRoute == 'check-ip'  ||
                    $currentRoute == 'quiz-category-list'  || $currentRoute == 'quiz-category-add' || $currentRoute == 'quiz-category-edit' ||
                    $currentRoute == 'admin-quiz-view'  ||  $currentRoute == 'admin-quiz-list'  || $currentRoute == 'admin-quiz-add' || $currentRoute == 'admin-quiz-edit' ||
                    $currentRoute == 'admin-quiz-add-question' ||  $currentRoute == 'admin-quiz-edit-question' ||
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

                        <li class="menu-item {{  $currentRoute == 'admin-quiz-add-question' ||  $currentRoute == 'admin-quiz-edit-question' ||   $currentRoute == 'admin-quiz-view'  ||  $currentRoute == 'admin-quiz-list'  || $currentRoute == 'admin-quiz-add' || $currentRoute == 'admin-quiz-edit' ? 'menu-item-active' : ''}}" aria-haspopup="true">
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

            <li class="menu-item {{ $currentRoute == 'admin-question' || $currentRoute == 'admin-question-add'  ? 'menu-item-active' : '' }} " aria-haspopup="true">
                <a href="{{ route('admin-question') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fab fa-quora text-white" aria-hidden="true"></i>
                    </span>
                    <span class="menu-text">Question List</span>
                </a>
            </li>

            <li class="menu-item menu-item-submenu {{ $currentRoute == 'admin-contact-us' ||  $currentRoute == 'admin-terms-conditions' || $currentRoute == 'admin-privacy-policy'  || $currentRoute == 'admin-quiz-rules'
                        ? 'menu-item-open menu-item-active' :'' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fa fa-flag text-white"></i>
                    </span>
                    <span class="menu-text">CMS Pages</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">

                        <li class="menu-item {{  $currentRoute == 'admin-privacy-policy' ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('admin-privacy-policy') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot text-white">
                                    <span></span>
                                </i>
                                <span class="menu-text">Privacy Policy</span>
                            </a>
                        </li>
                        <li class="menu-item {{  $currentRoute == 'admin-quiz-rules' ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('admin-quiz-rules') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot text-white">
                                    <span></span>
                                </i>
                                <span class="menu-text">Quiz Rules</span>
                            </a>
                        </li>

                        <li class="menu-item {{  $currentRoute == 'admin-terms-conditions' ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('admin-terms-conditions') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot text-white">
                                    <span></span>
                                </i>
                                <span class="menu-text">Terms Conditions</span>
                            </a>
                        </li>
                        <li class="menu-item {{  $currentRoute == 'admin-contact-us' ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{ route('admin-contact-us') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot text-white">
                                    <span></span>
                                </i>
                                <span class="menu-text">Contact Us</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="menu-item {{ $currentRoute == 'admin-partner-us' || $currentRoute == 'admin-partner-us-add'  ? 'menu-item-active' : '' }} " aria-haspopup="true">
                <a href="{{ route('admin-partner-us') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fa fa-handshake" aria-hidden="true" style="color: white !important"></i>
                    </span>
                    <span class="menu-text">Partner Us</span>
                </a>
            </li>

        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside Menu-->
