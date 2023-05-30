<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>

                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('translation.Categories')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                       
                            <li>
                                <a href="{{ route('category.index') }}"
                                   key="t-default">@lang('translation.Data_Category')</a>
                            </li>
                       
                            
                      
                    </ul>
                </li>
               
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboards">@lang('translation.Articles')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                           
                                <li>
                                    <a href="{{ route('article.index') }}" key="t-saas">@lang('translation.Data_Article')</a>
                                </li>
                           
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboards">@lang('translation.Pendaftar')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                           
                                <li>
                                    <a href="{{ route('pendaftar.index') }}" key="t-saas">@lang('translation.Data_Pendaftar')</a>
                                </li>
                           
                        </ul>
                    </li>
             
                   
               

                
                                  
             

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
