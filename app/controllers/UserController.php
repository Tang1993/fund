<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
	}

	/**
	 * Checker for login
	 */
	public function login(){
		return "hello,world";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$hasEmailAcount = User::where("email", Input::get('email'))->first();
		if ($hasEmailAcount == null) {
			// If the email hasn't been used, creat account for you .
			try {
				$user = User::create(Input::all());
				return Response::json(array("success" => true, "userInfo" => $user));
			} catch (Exception $exc) {
				return Response::json(array("success" => false,"because"=>"internalErr"));
			}
		}else{
			// The email address has been used to register by others
				return Response::json(array("success" => false,"because"=>"email-used"));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
