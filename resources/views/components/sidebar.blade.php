@php
$Adminlinks = [
    [
        "href" => "dashboard",
        "text" => "Dashboard",
        "is_multi" => false,
    ],
    [
        "href" => [
            [
                "section_text" => "User",
                "section_list" => [
                    ["href" => "user", "text" => "Data User"],
                    ["href" => "user.new", "text" => "Add User"],
                    ["href" => "roles.index", "text" => "Data Role"],
                    ["href" => "permissions.index", "text" => "Data Permission"]
                ]
            ]
        ],
        "text" => "User",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "Orders",
                "section_list" => [
                    ["href" => "orders.index", "text" => "Data Orders"],
                    ["href" => "orders.create", "text" => "Add Orders"]
                ]
            ]
        ],
        "text" => "Order",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "Items",
                "section_list" => [
                    ["href" => "items.index", "text" => "Data Item"],
                    ["href" => "items.create", "text" => "Add Item"]
                ]
            ]
        ],
        "text" => "Item",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "Contacts",
                "section_list" => [
                    ["href" => "contacts.index", "text" => "Data Contacts"],
                    ["href" => "contacts.create", "text" => "Add Contacts"]
                ]
            ]
        ],
        "text" => "Contact",
        "is_multi" => true,
    ],

];
$links = [
    [
        "href" => "dashboard",
        "text" => "Dashboard",
        "is_multi" => false,
    ],

    [
        "href" => [
            [
                "section_text" => "Orders",
                "section_list" => [
                    ["href" => "orders.index", "text" => "Data Orders"],
                    ["href" => "orders.create", "text" => "Add Orders"]
                ]
            ]
        ],
        "text" => "Order",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "Items",
                "section_list" => [
                    ["href" => "items.index", "text" => "Data Item"],
                    ["href" => "item.new", "text" => "Add Item"]
                ]
            ]
        ],
        "text" => "Item",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "Contacts",
                "section_list" => [
                    ["href" => "contacts.index", "text" => "Data Contacts"],

                ]
            ]
        ],
        "text" => "Contact",
        "is_multi" => true,
    ],

];
if(Auth::user()->isAdmin()){
    $navigation_links = array_to_object($Adminlinks);
}else  {
    $navigation_links = array_to_object($links);
}

@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <emmg class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><em class="fas fa-fire">
                </em><span>Dashboard</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">

                       @if($section->section_text == 'User')

                       <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <em class="fas fa-user"></em> <span>{{ $section->section_text }}</span></a>
                        @else
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                            <em class="fas fa-chart-bar"></em> <span>{{ $section->section_text }}</span></a>
                        @endif
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
