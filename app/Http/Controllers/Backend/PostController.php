<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Admin\Post\Post;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Admin\Post\PostCategory;

class PostController extends Controller
{
    public function PostCategoryView()
    {
        $postcategory = PostCategory::all();
        return view('admin.post.post_category.post_category_view', compact('postcategory'));
    }

    public function PostCategoryStore(Request $request)
    {
        $request->validate([
            'post_category_eng' => 'required|unique:post_categories|max:255',
            'post_category_bang' => 'required|unique:post_categories|max:255',
        ]);

        $data = new PostCategory();
        $data->post_category_eng = $request->post_category_eng;
        $data->post_category_bang = $request->post_category_bang;
        $data->save();

        $notification = array(
            'message' => 'Succesfully PostCategory Insert',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function PostCategoryEdit($id)
    {
        $postcategory = PostCategory::find($id);
        return view('admin.post.post_category.post_category_edit', compact('postcategory'));
    }

    public function PostCategoryUpdate(Request $request, $id)
    {
        $data = PostCategory::find($id);
        $data->post_category_eng = $request->post_category_eng;
        $data->post_category_bang = $request->post_category_bang;
        $data->save();

        $notification = array(
            'message' => 'Succesfully PostCategory Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('postcategory.view')->with($notification);
    }


    public function PostCategoryDelete($id)
    {
        $data = PostCategory::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Succesfully PostCategory Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    // -----------blog all function---------


    public function BlogView()
    {
        $blog = Post::all();
        return view('admin.post.blog.blog_view', compact('blog'));
    }

    public function BlogAdd()
    {

        $postcategory = PostCategory::all();
        return view('admin.post.blog.blog_add', compact('postcategory'));
    }

    public function BlogStore(Request $request)
    {

        $validated = $request->validate([
            'post_title_eng' => 'required|unique:posts|max:255',
            'post_title_bang' => 'required|unique:posts|max:255',
            'post_category_id' => 'required',
            'post_details_eng' => 'required',
            'post_details_bang' => 'required',
        ]);
        $data = new Post();
        $data->post_category_id     = $request->post_category_id;
        $data->post_title_eng       = $request->post_title_eng;
        $data->post_title_bang      = $request->post_title_bang;
        $data->post_details_eng     = $request->post_details_eng;
        $data->post_details_bang    = $request->post_details_bang;

        $post_img = $request->post_image;

        if ($post_img) {
            $image_one_name = hexdec(uniqid()) . '.' . $post_img->getClientOriginalExtension();
            Image::make($post_img)->resize(400, 200)->save('upload/post/' . $image_one_name);
            $data['post_image'] = 'upload/post/' . $image_one_name;
        }
        $data->save();

        $notification = array(
            'message' => 'Succesfully Post Insert',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.view')->with($notification);
    }

    public function BlogEdit($id)
    {
        $postcategory = PostCategory::all();
        $post = Post::find($id);
        return view('admin.post.blog.blog_edit', compact('postcategory', 'post'));
    }

    public function BlogUpdate(Request $request, $id)
    {

        $data = Post::find($id);
        $data->post_category_id     = $request->post_category_id;
        $data->post_title_eng       = $request->post_title_eng;
        $data->post_title_bang      = $request->post_title_bang;
        $data->post_details_eng     = $request->post_details_eng;
        $data->post_details_bang    = $request->post_details_bang;

        $img_one = $data->post_image;

        if ($request->file('post_image')) {
            $image_one = $request->file('post_image');
            @unlink($img_one);
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save('upload/post/' . $image_one_name);
            $data['post_image'] = 'upload/post/' . $image_one_name;
        }
        $data->save();

        $notification = array(
            'message' => 'Succesfully Post Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.view')->with($notification);
    }

    public function BlogDelete($id)
    {
        $data = Post::find($id);
        $image_one = $data->post_image;
        unlink($image_one);
        $data->delete();

        $notification = array(
            'message' => 'Succesfully Post Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('blog.view')->with($notification);
    }
}
