      <h5>Categories</h5>
      <ul>

      @foreach ($categories as $category)
        <li class="category">{{ link_to_route('category_view', strtoupper($category->category), $category->id) }}</li>
      @endforeach
      </ul>
 