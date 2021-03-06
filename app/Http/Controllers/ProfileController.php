<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('user.index')->with('user', Auth::user());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $user = User::query()->where('id', $id)->first();
    $this->validate($request, $this->rules(), [], $this->attributeNames());
    $errors = [];

    if (Hash::check($request->all()['password'], $user->password)) {
      $user->fill([
        'name' => $request->all()['name'],
        'email' => $request->all()['email'],
        'password' => Hash::make($request->all()['newPassword']),
      ])->save();
      return redirect()->route('profile.index')->with('success', 'Данные изменены успешно!');
    } else {
      $errors['password'][] = 'Не верно введён текущий пароль';
      return redirect()->route('profile.index')->withErrors($errors);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  protected function rules()
  {
    return [
      'name' => 'required|string',
      'email' => 'required|email|unique:users,email,' . Auth::id(),
      'password' => 'required',
      'newPassword' => 'min:3'
    ];
  }

  protected function attributeNames()
  {
    return [
      'newPassword' => 'Новый пароль'
    ];
  }
}
