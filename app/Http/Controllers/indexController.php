<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\publication;
use App\category;
use App\comment;
use Session;
use Cookie;

class indexController extends Controller
{
    public function index(){

    	$publications = publication::orderBy('id','DESC')->paginate(20);

    	return view('index/index')->with('publications',$publications);
    }

    public function show($id){

    	$publication = publication::find($id);

    	if($publication){
    		$comments = comment::select('comment','name','comments.created_at')->join('publications','publications.id','=','publication_id')->where('publications.id',$publication->id)->orderBy('comments.id','DESC')->take(5)->get();

			return view('index/publication')->with('publication',$publication)->with('comments',$comments);
    	}
		else{
			Session::flash('alert','Esta publicacion no existe');
    		Session::flash('alert-type','alert-danger');
			return redirect('/');
		}
    }

    public function create(){

    	$categories = category::all();

    	return view('index/create')->with('categories',$categories);
    }

    public function store(Request $request){

    	$publication = new publication($request->all() );
    	$publication->save();
    
    	if($request->categories) $publication->categories()->sync($request->categories);

    	Session::flash('alert','Publicacion Agregada');
    	Session::flash('alert-type','alert-success');

    	return redirect('/')->withCookie( cookie()->forever('plq'.$publication->id,$publication->id) );
    }

    public function myPublications(){

    	$publications = publication::orderBy('id','DESC')->paginate(20);

    	return view('index/mypublications')->with('publications',$publications);
    }

    public function sendComment(Request $request){

    	$comment = new comment($request->all() );
    	$comment->save();

    	$comments = comment::select('comment','name','comments.created_at')->join('publications','publications.id','=','publication_id')->where('publications.id',$request->publication_id)->orderBy('comments.id','DESC')->take(5)->get();

    	return $comments;
    }

    public function updateComments($id){

    	$comments = comment::select('comment','name','comments.created_at')->join('publications','publications.id','=','publication_id')->where('publications.id',$id)->orderBy('comments.id','DESC')->take(5)->get();

    	return $comments;
    }
}
