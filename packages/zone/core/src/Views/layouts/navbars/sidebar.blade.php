<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('WD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('White Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if (@$pageSlug == 'dashboard') class="active " @endif>
                <a href="">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fab fa-images"></i>
                    <p>{{ _('Banners') }}</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fab fa-product-hunt"></i>
                    <p>{{ _('Products') }}</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fab fa-product-hunt"></i>
                    <p>{{ _('Recipe') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#management" aria-expanded="true">
                    <i class="tim-icons icon-bullet-list-67" ></i>
                    <span class="nav-link-text" >{{ __('Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="management">
                    <ul class="nav pl-4">
                        <li @if (@$pageSlug == 'users') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Users') }}</p>
                            </a>
                        </li>
                        <li @if (@$pageSlug == 'profile') class="active " @endif>
                            <a href="{{route('management.role.list')}}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Roles') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
