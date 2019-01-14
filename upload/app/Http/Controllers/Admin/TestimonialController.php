<?php
/**
 * Created by PhpStorm.
 * User: tania
 * Date: 04.01.19
 * Time: 13:17
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class TestimonialController extends Controller
{
    public function index()
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            return redirect()->guest('login');
        }

        $testimonials = Testimonial::all();


        return view('admin.Testimonial.index',
            ['testimonials' => $testimonials,
                'viewTitle' => 'Testimonial',
                'indexActiveView' => 2]);
    }

    public function store(Request $request)
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            return redirect()->guest('login');
        }

        $this->validate($request, [
            'title' => 'required|max:100',
        ]);

        $allFields = $request->all();

        $image = $request->file('image');
        $path = $image->store('uploads', 'public');
        $allFields['image']= $path;

        Testimonial::create($allFields);

          return redirect()->route('testimonial.index')
             ->with('success', 'Testimonial created successfully');

    }

    public function create()
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            return redirect()->guest('login');
        }

        return view('admin.Testimonial.create',
            [  'viewTitle' => 'Testimonial',
                'indexActiveView' => 2]);
    }

    public function edit($id)
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            return redirect()->guest('login');
        }

        $testimonial = Testimonial::find($id);
        return view('admin.Testimonial.edit',
            ['viewTitle' => 'Testimonial',
                'indexActiveView' => 2,
                'testimonial' => $testimonial]);
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            return redirect()->guest('login');
        }

        $this->validate($request, [
            'title' => 'required'
        ]);

        $allFields = $request->all();
        $result = Testimonial::find($id)->update($allFields);
        return redirect()->route('testimonial.index')
            ->with('success','Testimonial updated successfully');

    }

    public function destroy($id)
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            return redirect()->guest('login');
        }

        Testimonial::find($id)->delete();
        return redirect()->route('testimonial.index')
            ->with('success', 'Task deleted successfully');
    }
}



