<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Follow;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','username' ,'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function tweets()
	{
		return $this->hasMany('App\Tweet');
	}

	public function follow(id)
	{
		f = new Follow
		f->user_id1 = $this->id
		f->user_id2 = id
		f->save
	}

	public function followers()
	{
		return Follow::where('user_id2' , '=', $this->id);
	}

	public function following()
	{
		return Follow::where('user_id1' , '=', $this->id);
	}

}
