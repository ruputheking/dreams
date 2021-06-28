<!-- Optionally, you can add icons to the links -->
<li class="{{ Nav::isRoute('dashboard') }}">
    <a href="{{ route('dashboard') }}" title="Dashboard">
        <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span>
    </a>
</li>

<li class="treeview {{ Nav::isRoute('profile.index') }} {{ Nav::isRoute('profile.edit') }} {{ Nav::isRoute('profile.password') }}">
    <a href="#">
        <i class="fa fa-user"></i> <span>Profile</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('profile.index') }}">
            <a href="{{route('profile.index')}}"><i class="fa fa-circle-o"></i>Profile</a>
        </li>
        <li class="{{ Nav::isRoute('profile.edit') }}">
            <a href="{{route('profile.edit')}}"><i class="fa fa-circle-o"></i>Update Profile</a>
        </li>
        <li class="{{ Nav::isRoute('profile.password') }}">
            <a href="{{route('profile.password')}}"><i class="fa fa-circle-o"></i>Change Password</a>
        </li>
    </ul>
</li>

<li class="treeview {{ Nav::isRoute('blogs.index') }} {{ Nav::isRoute('blogs.edit') }} {{ Nav::isRoute('category.index') }} {{ Nav::isRoute('category.edit') }} {{ Nav::isRoute('comments.index') }}">
    <a href="#">
        <i class="fas fa-blog"></i> <span style="padding-left:5px;"> Blog</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('blogs.index') }} {{ Nav::isRoute('blogs.edit') }}">
            <a href="{{route('blogs.index')}}"><i class="fa fa-circle-o"></i>All Blog</a>
        </li>
        <li class="{{ Nav::isRoute('category.index') }} {{ Nav::isRoute('category.edit') }}">
            <a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i>Category</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('handicrafts.index') }} {{ Nav::isRoute('handicrafts.create') }} {{ Nav::isRoute('handicrafts.show') }} {{ Nav::isRoute('handicrafts.edit') }} {{ Nav::isRoute('handicraft_categories.index') }} {{ Nav::isRoute('handicraft_categories.edit') }}">
    <a href="#">
        <i class="fas fa-campground"></i> <span style="padding-left:5px;"> Handicraft</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('handicrafts.index') }} {{ Nav::isRoute('handicrafts.create') }} {{ Nav::isRoute('handicrafts.show') }} {{ Nav::isRoute('handicrafts.edit') }}">
            <a href="{{route('handicrafts.index')}}"><i class="fa fa-circle-o"></i>All Items</a>
        </li>
        <li class="{{ Nav::isRoute('handicraft_categories.index') }} {{ Nav::isRoute('handicraft_categories.edit') }}">
            <a href="{{route('handicraft_categories.index')}}"><i class="fa fa-circle-o"></i>Category</a>
        </li>
    </ul>
</li>
<li
    class="treeview {{ Nav::isRoute('therapies.index') }} {{ Nav::isRoute('therapies.create') }} {{ Nav::isRoute('therapies.show') }} {{ Nav::isRoute('therapies.edit') }} {{ Nav::isRoute('therapy_categories.index') }} {{ Nav::isRoute('therapy_categories.edit') }}">
    <a href="#">
        <i class="fas fa-medkit"></i> <span style="padding-left:5px;"> Therapy</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('therapies.index') }} {{ Nav::isRoute('therapies.create') }} {{ Nav::isRoute('therapies.show') }} {{ Nav::isRoute('therapies.edit') }}">
            <a href="{{route('therapies.index')}}"><i class="fa fa-circle-o"></i>All Therapy</a>
        </li>
        <li class="{{ Nav::isRoute('therapy_categories.index') }} {{ Nav::isRoute('therapy_categories.edit') }}">
            <a href="{{route('therapy_categories.index')}}"><i class="fa fa-circle-o"></i>Category</a>
        </li>
    </ul>
</li>
<li class="treeview {{ Nav::isRoute('yogas.index') }} {{ Nav::isRoute('yogas.create') }} {{ Nav::isRoute('yogas.show') }} {{ Nav::isRoute('yogas.edit') }} {{ Nav::isRoute('categories.index') }} {{ Nav::isRoute('categories.edit') }}">
    <a href="#">
        <i class="fab fa-envira"></i> <span style="padding-left:5px;"> Yoga</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('yogas.index') }} {{ Nav::isRoute('yogas.create') }} {{ Nav::isRoute('yogas.show') }} {{ Nav::isRoute('yogas.edit') }}">
            <a href="{{route('yogas.index')}}"><i class="fa fa-circle-o"></i>All Yoga</a>
        </li>
        <li class="{{ Nav::isRoute('categories.index') }} {{ Nav::isRoute('categories.edit') }}">
            <a href="{{route('categories.index')}}"><i class="fa fa-circle-o"></i>Category</a>
        </li>
    </ul>
</li>

<li class="treeview {{ Nav::isRoute('folders.index') }} {{ Nav::isRoute('folders.edit') }} {{ Nav::isRoute('photo.index') }} {{ Nav::isRoute('photo.show') }} {{ Nav::isRoute('photo.edit') }}">
    <a href="#">
        <i class="fa fa-picture-o"></i> <span style="padding-left:5px;">Album</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('photo.index') }} {{ Nav::isRoute('photo.edit') }} {{ Nav::isRoute('photo.show') }}">
            <a href="{{route('photo.index')}}"><i class="fa fa-circle-o"></i>Gallery</a>
        </li>
        <li class="{{ Nav::isRoute('folders.index') }} {{ Nav::isRoute('folders.edit') }}">
            <a href="{{route('folders.index')}}"><i class="fa fa-circle-o"></i>All Folders</a>
        </li>
    </ul>
</li>

<li class="treeview {{ Nav::isRoute('sliders.index') }} {{ Nav::isRoute('sliders.create') }} {{ Nav::isRoute('sliders.edit') }} {{ Nav::isRoute('plugins.index') }} {{ Nav::isRoute('plugins.edit') }} {{ Nav::isRoute('plugins.create') }}">
    <a href="#">
        <i class="fa fa-th-large"></i> <span>Feature</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('sliders.index') }} {{ Nav::isRoute('sliders.create') }} {{ Nav::isRoute('sliders.edit') }}">
            <a href="{{route('sliders.index')}}"><i class="fa fa-circle-o"></i>Slider</a>
        </li>
    </ul>
</li>

<li class="treeview {{ Nav::isRoute('abouts.index') }} {{ Nav::isRoute('abouts.edit') }} {{ Nav::isRoute('abouts.create') }}">
    <a href="#">
        <i class="fa fa-address-card"></i> <span>Pages</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Nav::isRoute('abouts.index') }} {{ Nav::isRoute('abouts.create') }} {{ Nav::isRoute('abouts.edit') }}">
            <a href="{{route('abouts.index')}}"><i class="fa fa-circle-o"></i>About</a>
        </li>
    </ul>
</li>