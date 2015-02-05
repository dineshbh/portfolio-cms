<?php

class GalleryController extends \BaseController {

public function __construct() {
    $this->beforeFilter('csrf', array('on'=>'post'));
}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleryitems = Gallery_Item::orderBy('id','desc')->paginate(10);
		$categories = Gallery_Category::all();
		return View::make('admin.gallery.index')->withGalleryitems($galleryitems)->withCategories($categories);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Gallery_Category::lists('category', 'id');
		$category = array();
		return View::make('admin.gallery.create')->withCategory($category)->withCategories($categories);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create rules list
		$rules = array (
				'title' => array ('required', 'unique:gallery,title'),
				'category' => array ('required', 'exists:gallery_categories,id') 
			);

		// use laravel validator class to check if rules are met
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			// redirect and pass errors and input back to view
			return Redirect::route('admin.gallery.create')->withErrors($validator)->withInput();
		}

		// save data in database
		$title = Input::get('title');
		$category = Input::get('category');
		$link = Input::get('image_link');
		$text = Input::get('image_text');
		$month = Input::get('month');
		$year = Input::get('year');
		$date = sprintf("%02s",$year) . '-' . sprintf("%02s", $month) . '-01';
		$galleryitem = new Gallery_Item();
		if (empty($galleryitem->image_url)) {
			$galleryitem->image_url = 'gallery/no-image.jpg';
		}
		$galleryitem->title = $title;
		$galleryitem->category_id = $category;
		$galleryitem->image_link = $link;
		$galleryitem->image_text = $text;
		$galleryitem->date = $date;
		$galleryitem->save();

		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::action('GalleryController@edit', array($galleryitem->id))->withMessage('Gallery item was created!');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$galleryitem = Gallery_Item::findOrFail($id);
		$categories = Gallery_Category::lists('category', 'id');
		$category = $galleryitem->category_id;
		return View::make('admin.gallery.edit')->withGalleryitem($galleryitem)->withCategory($category)->withCategories($categories);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// create rules list
		$rules = array (
				'title' => array ('required', 'unique:gallery,title,'.$id),
				'category' => array ('required', 'exists:gallery_categories,id') 
			);

		// use laravel validator class to check if rules are met
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			// redirect and pass errors and input back to view
			return Redirect::route('admin.gallery.edit')->withErrors($validator)->withInput();
		}

		// save data in database
		$title = Input::get('title');
		$category = Input::get('category');
		$link = Input::get('image_link');
		$text = Input::get('image_text');
		$month = Input::get('month');
		$year = Input::get('year');
		$date = sprintf("%02s",$year) . '-' . sprintf("%02s", $month) . '-01';
		$galleryitem = Gallery_Item::findOrFail($id);
		if (empty($galleryitem->image_url)) {
			$galleryitem->image_url = 'gallery/no-image.jpg';
		}
		$galleryitem->title = $title;
		$galleryitem->category_id = $category;
		$galleryitem->image_link = $link;
		$galleryitem->image_text = $text;
		$galleryitem->date = $date;
		$galleryitem->update();
		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::route('admin.gallery.index')->withMessage('Gallery item was updated!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$galleryitem = Gallery_Item::findOrFail($id)->delete();
		return Redirect::route('admin.gallery.index')->withMessage('Gallery Item was deleted!');
	}

	public function uploadImageFile($id) { // Note: GD library is required for this function

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $iJpgQuality = 90;

        if ($_FILES) {

            // if no errors and size less than 250kb
            if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 250 * 1024) {
                if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {

                	$galleryitem = Gallery_Item::findOrFail($id);
					$slug = Str::slug($galleryitem->title);

                    // new unique filename
                    $sTempFileName = 'gallery/' . $slug . '-'. time();

                    // move uploaded file into gallery folder
                    move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);

                    // change file permission to 644
                    @chmod($sTempFileName, 0644);

                    if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }

                        // check for image type
                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';

                                // create a new image from file 
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;
                            case IMAGETYPE_PNG:
                                $sExt = '.png';

                                // create a new image from file 
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;
                            default:
                                @unlink($sTempFileName);
                                return;
                        }

                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;

                        // output image to file
                        imagejpeg($vImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);


						$galleryitem->image_url = $sResultFileName;
						$galleryitem->update();

                        return Redirect::back()->with('filename', $sResultFileName)->withMessage('Image Uploaded!');
                    }
                }
            }
        }
    }
}

}
