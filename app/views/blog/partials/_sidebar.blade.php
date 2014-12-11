
 
      <h5>Categories</h5>
      <ul class="side-nav">

      @foreach ($categories as $category)
        <li>{{ link_to_route('category_view', $category->category, $category->id) }}</li>
      @endforeach
      </ul>
 
      <div class="panel">
        <h5>Featured</h5>
        <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow.</p>
        <a href="#">Read More →</a>
      </div>
 