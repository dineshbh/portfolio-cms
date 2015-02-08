      <h5>Categorías</h5>
      <ul>
		<li class="category">{{ link_to_action('BlogController@index', 'All') }}</li>
      @foreach ($categories as $category)
        <li class="category">{{ link_to_action('BlogController@getByCat', ($category->category), $category->id) }}</li>
      @endforeach
      </ul>
 