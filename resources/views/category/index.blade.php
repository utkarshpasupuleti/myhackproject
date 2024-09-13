<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }
        .category-list {
            margin-top: 20px;
        }
        .category-item {
            margin-bottom: 15px;
        }
        .subcategory-list, .minsubcategory-list {
            margin-left: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mb-4">Categories</h1>
    <div class="category-list">
        @foreach($categories as $category)
            <div class="card category-item">
                <div class="card-header">
                    <h4 class="card-title">{{ $category->name }}</h4>
                </div>
                <div class="card-body">
                    @if($category->subcategories->isNotEmpty())
                        <ul class="list-group">
                            @foreach($category->subcategories as $subcategory)
                                <li class="list-group-item">
                                    <strong>{{ $subcategory->name }}</strong>
                                    @if($subcategory->minsubcategories->isNotEmpty())
                                        <ul class="list-group subcategory-list">
                                            @foreach($subcategory->minsubcategories as $minsubcategory)
                                                <li class="list-group-item">{{ $minsubcategory->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No subcategories available.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
