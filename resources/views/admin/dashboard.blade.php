<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #5b6af6;
            --secondary-color: #3f4ac5;
            --sidebar-bg: #2d3436;
            --sidebar-item-active: #4a5457;
            --text-light: #ecf0f1;
            --text-dark: #2c3e50;
            --text-muted: #7f8c8d;
            --bg-light: #f4f6f9;
            --card-bg: #FFFFFF;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            padding: 1rem;
            color: var(--text-light);
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
        .sidebar .nav-link {
            color: var(--text-light);
            padding: 10px 15px;
            margin-bottom: 5px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .sidebar .nav-link:hover {
            background-color: var(--sidebar-item-active);
        }
        .sidebar .nav-link.active {
            background-color: var(--sidebar-item-active);
            font-weight: 600;
        }
        .main-content {
            flex-grow: 1;
            padding: 2rem;
            transition: all 0.3s ease;
        }
        .navbar-brand, .sidebar-heading {
            font-weight: 700;
            color: white;
        }
        .summary-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        .summary-card .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .summary-card .icon-circle {
            background-color: var(--primary-color);
            color: white;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1.5rem;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            height: 200px;
            object-fit: cover;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
            transition: all 0.3s ease;
        }
        .btn-warning:hover {
            background-color: #e67e22;
            border-color: #e67e22;
        }
        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
            transition: all 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column p-3 text-white offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas">
        <h3 class="sidebar-heading text-center mb-4">Admin Panel</h3>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('articles.create') }}" class="nav-link">
                    <i class="fas fa-plus-square me-2"></i> New Article
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fas fa-users me-2"></i> Users
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://placehold.co/32x32/5b6af6/white" alt="mdo" width="32" height="32" class="rounded-circle me-2">
                <strong>Admin</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar for mobile -->
        <nav class="navbar navbar-light bg-light d-block d-md-none mb-4 rounded-3 shadow-sm">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <span class="navbar-brand mb-0 h1">Admin Dashboard</span>
            </div>
        </nav>

        <h1 class="mb-4 d-none d-md-block">Admin Dashboard</h1>

        @if(session('success'))
            <div class="alert alert-success rounded-3 shadow-sm">{{ session('success') }}</div>
        @endif

        <!-- Summary Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card summary-card bg-white">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title text-muted mb-0">Total Articles</h5>
                            <h2 class="mt-1 fw-bold">125</h2>
                        </div>
                        <div class="icon-circle bg-primary text-white">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card summary-card bg-white">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title text-muted mb-0">Pending Reviews</h5>
                            <h2 class="mt-1 fw-bold">12</h2>
                        </div>
                        <div class="icon-circle bg-warning text-white" style="background-color: #f39c12;">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card summary-card bg-white">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title text-muted mb-0">Total Users</h5>
                            <h2 class="mt-1 fw-bold">345</h2>
                        </div>
                        <div class="icon-circle bg-success text-white" style="background-color: #27ae60;">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">All Articles</h3>
            <a href="{{ route('articles.create') }}" class="btn btn-primary rounded-pill px-4 d-none d-md-inline-block">+ New Article</a>
        </div>

        <div class="row g-4">
            @forelse($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" 
                                 class="card-img-top" 
                                 alt="Article Image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text text-muted mb-4">
                                {{ Str::limit($article->content, 100) }}
                            </p>
                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-warning rounded-pill">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-article-id="{{ $article->id }}">
                                    Delete
                                </button>
                            </div>
                        </div>
                        <div class="card-footer text-muted small">
                            Posted {{ $article->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center w-100 mt-5">No articles found.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this article? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Get the modal and the delete form
    const deleteModal = document.getElementById('deleteConfirmationModal');
    const deleteForm = document.getElementById('deleteForm');

    // Add a listener to the modal's show event
    deleteModal.addEventListener('show.bs.modal', event => {
        // Get the button that triggered the modal
        const button = event.relatedTarget;
        // Extract the article ID from the data-article-id attribute
        const articleId = button.getAttribute('data-article-id');
        // Set the form's action URL dynamically
        // Note: The actual route building syntax is specific to Laravel's Blade engine.
        // This is a placeholder for how you would set the URL.
        const url = `/articles/${articleId}`; 
        deleteForm.setAttribute('action', url);
    });
</script>
</body>
</html>