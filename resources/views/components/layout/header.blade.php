<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="{{ route('news.index') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ route("news.index") }}" class="nav-link px-2 link-secondary">News</a></li>
        <li><a href="{{ route("categories.index") }}" class="nav-link px-2 link-dark">Categories</a></li>
        <li><a href="{{ route("make_order.index") }}" class="nav-link px-2 link-dark">Make order</a></li>
        <li><a href="{{ route("contacts.index") }}" class="nav-link px-2 link-dark">Contacts</a></li>
    </ul>

    <div class="col-md-3 text-end">
        <button onclick="location.href='{{ route('admin.index') }}';" type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button>
    </div>
</header>

