<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&amp;d=mm&amp;r=g" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{ route('admin.profile.index') }}" class="d-block">مهدی احمدی</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >

          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                 دشبورد  
              </p>
            </a>
          </li>
          {{-- @canany(['show-languages']) --}}
              <li class="nav-item has-treeview {{ in_array(Route::currentRouteName(), ['admin.languages.index', 'admin.languages.create', 'admin.languages.edit', 'admin.categories.index', 'admin.categories.create', 'admin.categories.edit', 'site-setting.index', 'admin.sliders.index', 'admin.sliders.create', 'admin.sliders.edit', 'admin.aboutus.index', 'admin.gallaries.index', 'admin.gallaries.create', 'admin.gallaries.edit', 'admin.site-setting.index', 'admin.brands.index', 'admin.brands.create', 'admin.brands.edit', 'admin.province.index', 'admin.province.create', 'admin.province.edit', 'admin.district.index', 'admin.district.create', 'admin.district.edit', 'admin.center-type.index', 'admin.center-type.create', 'admin.center-type.edit', 'admin.major.index', 'admin.major.create', 'admin.major.edit']) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.languages.index', 'admin.languages.create', 'admin.languages.edit', 'admin.categories.index', 'admin.categories.create', 'admin.categories.edit', 'admin.site-setting.index', 'admin.sliders.index', 'admin.sliders.create', 'admin.sliders.edit', 'admin.aboutus.index', 'admin.gallaries.index', 'admin.gallaries.create', 'admin.gallaries.edit', 'admin.site-setting.index', 'admin.brands.index', 'admin.brands.create', 'admin.brands.edit', 'admin.province.index', 'admin.province.create', 'admin.province.edit', 'admin.district.index', 'admin.district.create', 'admin.district.edit', 'admin.center-type.index', 'admin.center-type.create', 'admin.center-type.edit', 'admin.major.index', 'admin.major.create', 'admin.major.edit']) ? 'active' : '' }}">
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                      تنظیمات سیستم
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.languages.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.languages.index', 'admin.languages.create', 'admin.languages.edit']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>زبان ها</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.site-setting.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.site-setting.index']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>تنظیمات سیستم</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.sliders.index', 'admin.sliders.create', 'admin.sliders.edit']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>اسلایدر</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.gallaries.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.gallaries.index', 'admin.gallaries.create', 'admin.gallaries.edit']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>گالری تصاویر</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.aboutus.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.aboutus.index']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>درباره اداره</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.categories.index', 'admin.categories.create', 'admin.categories.edit']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>دسته بندی ها</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.brands.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.brands.index', 'admin.brands.create', 'admin.brands.edit']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>حمایت کننده ها</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.province.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.province.index', 'admin.province.create', 'admin.province.edit']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>ولایات</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.district.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.district.index', 'admin.district.create', 'admin.district.edit']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>ولسوالی</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.center-type.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.center-type.index', 'admin.center-type.create', 'admin.center-type.edit']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>نوعیت مرکز های تعلیمی</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.major.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.major.index', 'admin.major.create', 'admin.major.edit']) ? 'active' : '' }}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>رشته های تحصیلی</p>
                    </a>
                  </li>
                </ul>
              </li>
            {{-- @endcan --}}

            <li class="nav-item has-treeview {{ in_array(Route::currentRouteName(), ['admin.news.index', 'admin.news.create', 'admin.news.edit', 'admin.important-activity.index', 'admin.important-activity.create', 'admin.important-activity.edit', 'admin.institute.index', 'admin.institute.create', 'admin.institute.edit', 'admin.school.index', 'admin.school.create', 'admin.school.edit', 'admin.special-teaching.index', 'admin.special-teaching.create', 'admin.special-teaching.edit', 'admin.inovation.index', 'admin.inovation.create', 'admin.inovation.edit']) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.news.index', 'admin.news.create', 'admin.news.edit', 'admin.important-activity.index', 'admin.important-activity.create', 'admin.important-activity.edit', 'admin.institute.index', 'admin.institute.create', 'admin.institute.edit', 'admin.school.index', 'admin.school.create', 'admin.school.edit', 'admin.special-teaching.index', 'admin.special-teaching.create', 'admin.special-teaching.edit', 'admin.inovation.index', 'admin.inovation.create', 'admin.inovation.edit']) ? 'active' : '' }}">
                <i class="nav-icon fa fa-users"></i>
                <p>
                     خبر ها و نشرات
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.news.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.news.index', 'admin.news.create', 'admin.news.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اخبار</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.important-activity.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.important-activity.index', 'admin.important-activity.create', 'admin.important-activity.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>فعالیت های مهم</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.institute.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.institute.index', 'admin.institute.create', 'admin.institute.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>انستیتوت ها</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.school.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.school.index', 'admin.school.create', 'admin.school.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>لیسه ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.special-teaching.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.special-teaching.index', 'admin.special-teaching.create', 'admin.special-teaching.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>تعلیمات خاص</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.inovation.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.inovation.index', 'admin.inovation.create', 'admin.inovation.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>ابتکارات محصلین</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item has-treeview {{ in_array(Route::currentRouteName(), ['admin.article.index', 'admin.article.create', 'admin.article.edit']) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.article.index', 'admin.article.create', 'admin.article.edit']) ? 'active' : '' }}">
                <i class="nav-icon fa fa-users"></i>
                <p>
                     آموزش
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.article.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.article.index', 'admin.article.create', 'admin.article.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>مقالات</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview {{ in_array(Route::currentRouteName(), ['admin.agreement.index', 'admin.agreement.create', 'admin.agreement.edit', 'admin.achievement.index', 'admin.achievement.create', 'admin.achievement.edit', 'admin.procurement-contracts.index', 'admin.procurement-contracts.create', 'admin.procurement-contracts.edit', 'admin.guidelines.index', 'admin.guidelines.create', 'admin.guidelines.edit', 'admin.procedures.index', 'admin.procedures.create', 'admin.procedures.edit', 'admin.headships.index', 'admin.headships.create', 'admin.headships.edit', 'admin.headship-forms.index', 'admin.headship-forms.create', 'admin.headship-forms.edit']) ? 'menu-open' : '' }}">

              <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.agreement.index', 'admin.agreement.create', 'admin.agreement.edit', 'admin.achievement.index', 'admin.achievement.create', 'admin.achievement.edit', 'admin.procurement-contracts.index', 'admin.procurement-contracts.create', 'admin.procurement-contracts.edit', 'admin.guidelines.index', 'admin.guidelines.create', 'admin.guidelines.edit', 'admin.procedures.index', 'admin.procedures.create', 'admin.procedures.edit', 'admin.headships.index', 'admin.headships.create', 'admin.headships.edit', 'admin.headship-forms.index', 'admin.headship-forms.create', 'admin.headship-forms.edit']) ? 'active' : '' }}">
                <i class="nav-icon fa fa-users"></i>
                <p>
                     بانک اطلاعاتی
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.agreement.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.agreement.index', 'admin.agreement.create', 'admin.agreement.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>تفاهم نامه</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.achievement.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.achievement.index', 'admin.achievement.create', 'admin.achievement.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>دستاورد ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.procurement-contracts.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.procurement-contracts.index', 'admin.procurement-contracts.create', 'admin.procurement-contracts.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>تدارکات و مالی</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.guidelines.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.guidelines.index', 'admin.guidelines.create', 'admin.guidelines.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>رهنمود ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.procedures.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.procedures.index', 'admin.procedures.create', 'admin.procedures.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>طرزالعمل ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.headships.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.headships.index', 'admin.headships.create', 'admin.headships.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>فورم های عرضه خدمات</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.headship-forms.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.headship-forms.index', 'admin.headship-forms.create', 'admin.headship-forms.edit']) ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>فایل های عرضه خدمات</p>
                  </a>
                </li>
              </ul>
            </li>
          {{-- something --}}
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
