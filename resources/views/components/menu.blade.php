<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas {{ $icon }}"></i>
        <p>
            {{ Str::ucfirst($name) }}
        <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url($routeName.'s') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
                <p>List</p>
            </a>
            </li>
        <li class="nav-item">
        <a href="{{ url($routeName.'s'.'/create') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Create</p>
        </a>
        </li>
    </ul>
</li>