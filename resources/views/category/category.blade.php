<!-- Category Navbar -->
<nav id="category-navbar" class="navbar navbar-expand-lg fixed-top navbar-dark category-navbar">
    <div class="container">
        <!-- Close button positioned within the navbar content -->
        <button class="close-category-navbar" id="close-category-btn">&times;</button>
        <ul class="navbar-nav ml-auto">
            @foreach($categories as $category)
                <li class="nav-item category-menu">
                        <span class="nav-link category-link" id="category{{ $category->id }}Dropdown">
                            {{ $category->name }}
                            <button class="btn btn-link dropdown-toggle ml-auto" type="button" id="toggleButton{{ $category->id }}"></button>
                        </span>
                    <div id="dropdownMenu{{ $category->id }}" class="dropdown-menu" aria-labelledby="category{{ $category->id }}Dropdown">
                        @foreach($category->subcategories as $subcategory)
                            <div class="submenu-item">
                                {{ $subcategory->name }}
                                <span class="plus-sign">+</span>
                                <div class="submenu">
                                    @foreach($subcategory->minsubcategories as $minsubcategory)
                                        <a class="dropdown-item" href="#" data-query="{{ $minsubcategory->name }}">{{ $minsubcategory->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
