<ul class="side-nav">
    <li>{{ link_to_action('PostsController@index', 'Posts') }}</li>
    <li>{{ link_to_action('PostCategoryController@index', 'Post Categories') }}</li>
    <li>{{ link_to_action('CommentController@index', 'Comments') }}</li>
    <li>{{ link_to_action('GalleryController@index', 'Gallery') }}</li>
    <li>{{ link_to_action('GalleryCategoryController@index', 'Gallery Categories') }}</li>
    <li>{{ link_to_action('UserController@index', 'Users') }}</li>
</ul>     
